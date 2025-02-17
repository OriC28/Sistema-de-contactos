<?php

/**
 * Manages data access and business logic for clients.
 *
 * This class interacts with the database to perform CRUD operations on client data.
 * It implements the `Methods` interface to ensure consistent method signatures.
 *
 * @package    ClientAPI\Models
 * @author     Oriana Colina <orianacolina.perea@gmail.com>
 * @version    1.0.0
 * @license    MIT
 */

require_once __DIR__ . '/Connection.php';

/**
 * Interface defining the methods for client data manipulation.
 *
 * @package    ClientAPI\Models
 */
interface Methods
{
    /**
     * Get a paginated list of clients.
     *
     * @param int $perPage Number of records per page.
     * @param int $currentPage Current page number.
     * @return array Clients, total pages, and current page.
     */
    public function getClientsPaginate(int $perPage, int $currentPage): array;

    /**
     * Save a new client to the database.
     *
     * @param array $data Client data to save.
     * @return string|false The ID of the newly created client or false on failure.
     */
    public function saveClient(array $data): string|false;

    /**
     * Get a client by ID.
     *
     * @param int $id The ID of the client to fetch.
     * @return mixed An array with client data or false if not found.
     */
    public function getClientById(int $id): mixed;

    /**
     * Update a client's data by ID.
     *
     * @param int $id The ID of the client to update.
     * @param array $data New client data.
     * @return bool True if the update was successful, false otherwise.
     */
    public function updateClientById(int $id, array $data): bool;

    /**
     * Delete a client by ID.
     *
     * @param int $id The ID of the client to delete.
     * @return bool True if the deletion was successful, false otherwise.
     */
    public function deleteClientById(int $id): bool;
}

/**
 * Model for manipulating the database.
 *
 * This class implements the `Methods` interface and provides methods for interacting
 * with the `clients` table in the database.
 *
 * @package    ClientAPI\Models
 */
class ClientModel implements Methods
{
    /**
     * The database connection instance.
     *
     * @var PDO
     */
    private $conn;

    /**
     * ClientModel constructor.
     *
     * Initializes the database connection using the `Connection` class.
     */
    public function __construct()
    {
       $connObject = new Connection();
        $this->conn = $connObject->connect();
    }

    /**
     * Get a paginated list of clients.
     *
     * Fetches a subset of clients based on the specified pagination parameters.
     *
     * @param int $perPage Number of records per page.
     * @param int $currentPage Current page number.
     * @return array Clients, total pages, and current page.
     */
    public function getClientsPaginate(int $perPage, int $currentPage): array
    {
        $cursor = $this->conn->prepare("SELECT COUNT(*) AS total FROM clients;");
        $cursor->execute();
        $totalRows = $cursor->fetch(PDO::FETCH_ASSOC)['total'];
        $totalPages = ceil($totalRows / $perPage);

        // Calculate the offset for the query
        $offset = ($currentPage - 1) * $perPage;

        $cursor = $this->conn->prepare("SELECT * FROM clients LIMIT :offset, :perPage;");
        $cursor->bindParam(':offset', $offset, PDO::PARAM_INT);
        $cursor->bindParam(':perPage', $perPage, PDO::PARAM_INT);
        $cursor->execute();
        $clients = $cursor->fetchAll(PDO::FETCH_ASSOC);

        return [
            'clients' => $clients,
            'totalPages' => $totalPages,
            'currentPage' => $currentPage,
        ];
    }

    /**
     * Get a client by ID.
     *
     * Fetches a client's details from the database based on the provided ID.
     *
     * @param int $id The ID of the client to fetch.
     * @return mixed An array with client data or false if not found.
     */
    public function getClientById(int $id): mixed
    {
        $sql = "SELECT * FROM clients WHERE id = :id";
        $cursor = $this->conn->prepare($sql);
        $cursor->bindParam(':id', $id, PDO::PARAM_INT);
        $cursor->execute();
        return $cursor->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Save a new client to the database.
     *
     * Inserts a new client's data into the database and returns the ID of the newly created record.
     *
     * @param array $data Client data to save.
     * @return string|false The ID of the newly created client or false on failure.
     */
    public function saveClient(array $data): string|false
    {
        $sql = "INSERT INTO clients(firstName, lastName, firstSurname, secondSurname, 
                companyName, rol, email, phone) VALUES (:firstName, :lastName, 
                :firstSurname, :secondSurname, :companyName, :rol, :email, :phone);";

        $cursor = $this->conn->prepare($sql);
        $cursor->bindParam(":firstName", $data['firstName'], PDO::PARAM_STR);
        $cursor->bindParam(":lastName", $data['lastName'], PDO::PARAM_STR);
        $cursor->bindParam(":firstSurname", $data['firstSurname'], PDO::PARAM_STR);
        $cursor->bindParam(":secondSurname", $data['secondSurname'], PDO::PARAM_STR);
        $cursor->bindParam(":companyName", $data['companyName'], PDO::PARAM_STR);
        $cursor->bindParam(":rol", $data['rol'], PDO::PARAM_STR);
        $cursor->bindParam(":email", $data['email'], PDO::PARAM_STR);
        $cursor->bindParam(":phone", $data['phone'], PDO::PARAM_STR);

        $cursor->execute();
        return $this->conn->lastInsertId();
    }

    /**
     * Update a client's data by ID.
     *
     * Updates an existing client's data in the database based on the provided ID.
     *
     * @param int $id The ID of the client to update.
     * @param array $data New client data.
     * @return bool True if the update was successful, false otherwise.
     */
    public function updateClientById(int $id, array $data): bool
    {
        $sql = "UPDATE clients SET firstName = :firstName, lastName = :lastName,
                firstSurname = :firstSurname, secondSurname = :secondSurname,
                companyName = :companyName, rol = :rol, email = :email, phone = :phone
                WHERE id = :id;";
        $cursor = $this->conn->prepare($sql);
        $cursor->bindParam(':id', $id, PDO::PARAM_INT);
        $cursor->bindParam(":firstName", $data['firstName'], PDO::PARAM_STR);
        $cursor->bindParam(":lastName", $data['lastName'], PDO::PARAM_STR);
        $cursor->bindParam(":firstSurname", $data['firstSurname'], PDO::PARAM_STR);
        $cursor->bindParam(":secondSurname", $data['secondSurname'], PDO::PARAM_STR);
        $cursor->bindParam(":companyName", $data['companyName'], PDO::PARAM_STR);
        $cursor->bindParam(":rol", $data['rol'], PDO::PARAM_STR);
        $cursor->bindParam(":email", $data['email'], PDO::PARAM_STR);
        $cursor->bindParam(":phone", $data['phone'], PDO::PARAM_STR);
        $cursor->execute();
        return $cursor->rowCount() > 0;
    }

    /**
     * Delete a client by ID.
     *
     * Deletes a client from the database based on the provided ID.
     *
     * @param int $id The ID of the client to delete.
     * @return bool True if the deletion was successful, false otherwise.
     */
    public function deleteClientById(int $id): bool
    {
        $sql = "DELETE FROM clients WHERE id = :id";
        $cursor = $this->conn->prepare($sql);
        $cursor->bindParam(':id', $id, PDO::PARAM_INT);
        $cursor->execute();
        return $cursor->rowCount() > 0;
    }
}