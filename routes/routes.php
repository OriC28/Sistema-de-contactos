<?php

/**
 * API Entry Point
 *
 * This script serves as the entry point for handling HTTP requests to the Client API.
 * It determines the HTTP method, path, and parameters, and delegates the request
 * to the appropriate method in the `ClientController`.
 *
 * @package    ClientAPI\Routes
 * @author     Oriana Colina <orianacolina.perea@gmail.com>
 * @version    1.0.0
 * @license    MIT
 */

require_once __DIR__.'/../controllers/ClientController.php';

// Set the response content type to JSON
header("Content-Type: application/json");

// Get the HTTP method (GET, POST, PUT, DELETE)
$method = $_SERVER['REQUEST_METHOD'];

// Get the request path (e.g., /clients/1)
$path = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/';

// Extract the ID from the path if it exists
$searchId = explode('/', $path);
$id = ($path !== '/') && is_numeric(end($searchId)) ? end($searchId) : null;

// Instantiate the ClientController
$controller = new ClientController();

// Handle the request based on the HTTP method
switch ($method) {
    case 'GET':
        // Handle GET requests
        if (isset($_GET['page']) && !empty($_GET['page'])) {
            // Paginate clients if the 'page' parameter is provided
            $page = $_GET['page'] ? intval($_GET['page']) : 1;
            $controller->getClientsPaginate($page);
        } elseif ($path === "/clients/$id") {
            // Get a specific client by ID if the path matches /clients/{id}
            $controller->getClientById($id);
        }
        break;

    case 'POST':
        // Handle POST requests to create a new client
        $controller->saveClient();
        break;

    case 'PUT':
        // Handle PUT requests to update an existing client by ID
        $controller->updateClientById($id);
        break;

    case 'DELETE':
        // Handle DELETE requests to delete a client by ID
        $controller->deleteClientById($id);
        break;

    default:
        // Return a 400 error if the HTTP method is not supported
        http_response_code(400);
        echo json_encode(array("error" => "Method not allowed."));
}