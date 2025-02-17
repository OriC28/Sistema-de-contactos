<?php

/**
 * Client Controller
 *
 * Handles all business logic related to clients, including CRUD operations.
 * This class interacts with the `ClientModel` to fetch, create, update, and delete client data.
 *
 * @package    ClientAPI\Controllers
 * @author     Oriana Colina <orianacolina.perea@gmail.com>
 * @version    1.0.0
 * @license    MIT
 */

require_once __DIR__."/../models/ClientModel.php";
require_once __DIR__.'/../models/Validator.php';

class ClientController
{
    /**
     * The client model instance.
     *
     * @var ClientModel
     */
    private $model;

    /**
     * ClientController constructor.
     *
     * Initializes the controller by creating an instance of the `ClientModel`.
     */
    public function __construct()
    {
        $this->model = new ClientModel();
    }

    /**
     * Get a client by ID.
     *
     * Fetches a client's details from the database based on the provided ID.
     * If the client does not exist, an error message is returned.
     *
     * @param int $id The ID of the client to fetch.
     * @return void
     */
    public function getClientById(int $id)
    {
        $client = $this->model->getClientById($id);
        if (!$client) {
            echo json_encode(array('error' => 'Id not exists.'));
            return;
        }
        $sanitizedArray = getSanitizeData($client);
        // Replace client data obtained with sanitized data
        echo json_encode($sanitizedArray);
    }

    /**
     * Save a new client.
     *
     * Validates and saves a new client's data to the database.
     * If the data is invalid, an error response is returned.
     *
     * @return void
     */
    public function saveClient()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        if (isset($data) && count($data) === 8) {
            $validationResult = validateData($data);
            if (isset($validationResult['errors']) && !empty($validationResult['errors'])) {
                header('Content-Type: application/json');
                http_response_code(400);
                echo json_encode(['errors' => $validationResult['errors']]);
                return;
            }
            $id = $this->model->saveClient($data);
            echo json_encode(['id' => $id]);
        } else {
            http_response_code(400);
            echo json_encode(['error' => 'The server did not receive all the required data.']);
        }
    }

    /**
     * Update a client by ID.
     *
     * Validates and updates an existing client's data in the database.
     * If the client does not exist or the data is invalid, an error response is returned.
     *
     * @param int $id The ID of the client to update.
     * @return void
     */
    public function updateClientById(int $id)
    {
        $data = json_decode(file_get_contents('php://input'), true);
        if (isset($data) && count($data) === 8) {
            $validationResult = validateData($data);
            if (isset($validationResult['errors']) && !empty($validationResult['errors'])) {
                header('Content-Type: application/json');
                http_response_code(400);
                echo json_encode(['errors' => $validationResult['errors']]);
                return;
            }
            $done = $this->model->updateClientById($id, $data);
            if ($done) {
                echo json_encode(array('message' => 'Client updated successfully.'));
            } else {
                http_response_code(404);
                echo json_encode(array('error' => 'Client not found.'));
            }
        }
    }

    /**
     * Delete a client by ID.
     *
     * Deletes a client from the database based on the provided ID.
     * If the client does not exist, an error response is returned.
     *
     * @param int $id The ID of the client to delete.
     * @return void
     */
    public function deleteClientById(int $id)
    {
        $done = $this->model->deleteClientById($id);
        if ($done) {
            echo json_encode(array('message' => 'Client deleted successfully.'));
        } else {
            http_response_code(404);
            echo json_encode(array('error' => 'Client not found.'));
        }
    }

    /**
     * Get clients with pagination.
     *
     * Fetches a paginated list of clients from the database.
     * The results are sanitized before being returned.
     *
     * @param int $currentPage The current page number for pagination.
     * @return void
     */
    public function getClientsPaginate(int $currentPage)
    {
        $perPage = 5;
        $data = $this->model->getClientsPaginate($perPage, $currentPage);
        $sanitizedArray = getSanitizeData($data);
        // Replace client data obtained with sanitized data
        $data['clients'] = $sanitizedArray;
        echo json_encode($data);
    }
}