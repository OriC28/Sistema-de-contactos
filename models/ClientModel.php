<?php

require_once __DIR__.'/Connection.php';

interface Methods{
    public function getClientsPaginate(int $perPage, int $currentPage);
    public function saveClient(array $data);
    public function getClientById(int $id);
    public function updateClientById(int $id, array $data);
    public function deleteClientById(int $id);
    # Falta agregar los métodos para filtrar en la búsqueda
}
/**
 * Model for manipulating the database.
 */
class ClientModel implements Methods{
    private $conn;
    public function __construct()
    {
        $this->conn = new Connection();
        $this->conn = $this->conn->connect();
    }
    /**
     * Get all clients per page
     * @param int $perPage pages per record
     * @param int $currentPage current page in the table
     * @return array clients, total pages and current page
     */
    public function getClientsPaginate(int $perPage, int $currentPage): array
    {
        $cursor = $this->conn->prepare("SELECT COUNT(*) AS total FROM clients;");
        $cursor->execute();
        $totalRows = $cursor->fetch(PDO::FETCH_ASSOC)['total'];
        $totalPages = ceil($totalRows/$perPage);

        # Calculating from which record the data will be searched
        $offset = ($currentPage - 1)*$perPage;

        $cursor = $this->conn->prepare("SELECT * FROM clients LIMIT :offset, :perPage;");
        $cursor->bindParam(':offset', $offset, PDO::PARAM_INT);
        $cursor->bindParam(':perPage', $perPage, PDO::PARAM_INT);
        $cursor->execute();
        $clients = $cursor->fetchAll(PDO::FETCH_ASSOC);
        return array('clients' => $clients, 'totalPages' => $totalPages, 'currentPage' => $currentPage);
    }
     /**
     * Get some client by id
     * @param int $id Customer id
     * @return array
     */
    public function getClientById(int $id): array
    {
        $sql = "SELECT * FROM clients WHERE id = :id";
        $cursor = $this->conn->prepare($sql);
        $cursor->bindParam(':id', $id, PDO::PARAM_INT);
        $cursor->execute();
        return $cursor->fetch(PDO::FETCH_ASSOC);
    }
    /**
     * Insert client into database
     * @return array
     */
    public function saveClient(array $data): string|false
    {
        $sql = "INSERT INTO clients(
                    firstName, lastName, 
                    firstSurname, secondSurname, 
                    companyName, rol, email, phone) VALUES (
                    :firstName, :lastName, :firstSurname,
                    :secondSurname, :companyName, :rol, 
                    :email, :phone);";
        
        $cursor = $this->conn->prepare($sql);
        foreach($data as $key => $field){
            $cursor->bindParam(":$key", $field, PDO::PARAM_STR);
        }
        $cursor->execute();
        return  $this->conn->lastInsertId();
    }
    /**
     * Update some data about specific client
     * @param int $id Customer id
     * @return bool
     */
    public function updateClientById(int $id, array $data): bool
    {
        $sql = "UPDATE clients SET firstName = :firstName, lastName = :lastName,
                firstSurname = :firstSurname, secondSurname = :secondSurname,
                companyName = :companyName, rol = :rol, email = :email, phone = :phone
                WHERE id = :id;";
        $cursor = $this->conn->prepare($sql);
        foreach($data as $key => $field){
            $cursor->bindParam(":$key", $field, PDO::PARAM_STR);
        }
        $cursor->bindParam(':id', $id, PDO::PARAM_INT);
        $cursor->execute();
        return $cursor->rowCount()>0;
    }
        /**
     * Delete a specific client
     * @param int $id Customer id
     * @return bool
     */
    public function deleteClientById(int $id): bool
    {
        $sql = "DELETE FROM clients WHERE id = :id";
        $cursor = $this->conn->prepare($sql);
        $cursor->bindParam(':id', $id, PDO::PARAM_INT);

        $cursor->execute();
        return $cursor->rowCount()>0;
    }
}
