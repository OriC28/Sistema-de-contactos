<?php 
require_once "../models/Connection.php";

interface ApiMethods{
    public function getAllClients();
    public function saveClient();
    public function getClientById(int $id);
    public function updateClientById(int $id);
    public function deleteClientById(int $id);
    # Falta agregar los métodos para filtrar en la búsqueda
}

class Api implements ApiMethods{
    private $conn;
    public function __construct()
    {
        $this->conn = new Connection();
        $this->conn = $this->conn->connect();
    }
    /**
     * Get all clients into database
     * @return void
     * @throws Exception If can not get all clients
     */
    public function getAllClients(): void
    {
        try{
            $cursor = $this->conn->prepare("SELECT * FROM clients;");
            if($cursor->execute()){
                $clients = array();
                while($row = $cursor->fetchAll(PDO::FETCH_ASSOC)){
                    $clients[] = $row;
                }
                echo json_encode($clients);
            }
       }catch(\Throwable $e){
            http_response_code(500);
            echo json_encode(array("error" => $e->getMessage()));
        }
    }
    /**
     * Set bind param for each field of type string
     * @return void
     */
    private function bindParamAll(PDOStatement $cursor, string $parameter, string $field): void
    {
        $cursor->bindParam($parameter, $field, PDO::PARAM_STR);
    }

    /**
     * Insert client into database
     * @return void
     * @throws Exception If can not save the client
     */
    public function saveClient(): void
    {
        try{
            $data = json_decode(file_get_contents('php://input'), true);
            $sql = "INSERT INTO clients(
                        firstName, lastName, 
                        firstSurname, secondSurname, 
                        companyName, rol, email, phone) VALUES (
                        :firstName, :lastName, :firstSurname,
                        :secondSurname, :companyName, :rol, 
                        :email, :phone);";
            
            $cursor = $this->conn->prepare($sql);

            foreach($data as $key => $field){
                $this->bindParamAll($cursor, ":$key", $field);
            }

            if($cursor->execute()){
                $data['id'] = $this->conn->lastInsertId();
                http_response_code(201);
                echo json_encode($data);
            }else{
                echo json_encode(array("error" => "Could not add client."));
            }
        }catch(\Throwable $e){
            http_response_code(500);
            echo json_encode(array("error" => $e->getMessage()));
        }
    }
    /**
     * Get some client by id
     * @param int $id Customer id
     * @return void 
     * @throws Exception If can not get some client
     */
    public function getClientById(int $id): void
    {
        try{
            $sql = "SELECT * FROM clients WHERE id = :id";
            $cursor = $this->conn->prepare($sql);
            $cursor->bindParam(':id', $id, PDO::PARAM_INT);
            if($cursor->execute()){
                $client = $cursor->fetch(PDO::FETCH_ASSOC);
                if($client){
                    echo json_encode($client);
                }else{
                    http_response_code(404);
                    echo json_encode(array('error' => 'Client not found'));
                }
            }
        }catch (\Throwable $e){
            http_response_code(500);
            echo json_encode(array("error" => $e->getMessage()));
        }
    }
    /**
     * Update some data about specific client
     * @param int $id Customer id
     * @return void 
     * @throws Exception If can not update some client
     */
    public function updateClientById(int $id): void
    {
        try {
            $data = json_decode(file_get_contents('php://input'), true);
            $sql = "UPDATE clients SET firstName = :firstName, lastName = :lastName,
                    firstSurname = :firstSurname, secondSurname = :secondSurname,
                    companyName = :companyName, rol = :rol, email = :email, phone = :phone
                    WHERE id = :id;";
            $cursor = $this->conn->prepare($sql);
            foreach($data as $key => $field){
                $this->bindParamAll($cursor, ":$key", $field);
            }
            $cursor->bindParam(':id', $id, PDO::PARAM_INT);

            if($cursor->execute() && $cursor->rowCount()>0){
                http_response_code(201);
                echo json_encode($data);
            }else{
                echo json_encode(array("error" => "Could not update client."));
            }
        } catch (\Throwable $e){
            http_response_code(500);
            echo json_encode(array("error" => $e->getMessage()));
        }
    }
     /**
     * Delete a specific client
     * @param int $id Customer id
     * @return void 
     * @throws Exception If can not delete the client
     */
    public function deleteClientById(int $id)
    {
        try {
            $sql = "DELETE FROM clients WHERE id = :id";
            $cursor = $this->conn->prepare($sql);
            $cursor->bindParam(':id', $id, PDO::PARAM_INT);

            if($cursor->execute() && $cursor->rowCount()>0){
                echo json_encode(array('message' => 'Client deleted successfully.'));
            }
        } catch (\Throwable $e) {
            http_response_code(500);
            echo json_encode(array("error" => $e->getMessage()));
        }
       
    }
}
