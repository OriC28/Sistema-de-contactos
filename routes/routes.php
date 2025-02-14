<?php

require_once __DIR__.'/../controllers/ClientController.php';

header("Content-Type: application/json");

$method = $_SERVER['REQUEST_METHOD'];
$path = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/';
$searchId = explode('/', $path);
$id = ($path !== '/') ? end($searchId) : null;

$controller = new ClientController();
switch($method){
    case 'GET':
        if(isset($_GET['page']) && !empty($_GET['page'])){
            $page = $_GET['page'] ? intval($_GET['page']) : 1;
            $controller->getClientsPaginate($page);
        }
        if($path === "/clients/$id"){
            if(is_numeric($id)){
                $controller->getClientById($id);
            }else{
                http_response_code(406);
                echo json_encode(array('error' => 'Id invalid.'));
            }
        }
        break;
    case 'POST':
        $controller->saveClient();
        break;
    case 'PUT':
        $controller->updateClientById($id);
        break;
    case 'DELETE':
        $controller->deleteClientById($id);
        break;
    default:
        http_response_code(400);
        echo json_encode(array("error" => "Method not allowed."));
}