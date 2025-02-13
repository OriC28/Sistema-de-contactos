<?php 

require_once "Api.php";

header("Content-Type: application/json");

$method = $_SERVER['REQUEST_METHOD'];
$path = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/';
$searchId = explode('/', $path);
$id = ($path !== '/') ? end($searchId) : null;

$api = new Api();

switch($method){
    case 'GET':
        if($path === '/clients'){
            $api->getAllClients();
        }
        if($path === "/clients/$id"){
            if(is_numeric($id)){
                $api->getClientById($id);
            }else{
                http_response_code(406);
                echo json_encode(array('error' => 'Id invalid.'));
            }
        }
        break;
    case 'POST':
        $api->saveClient();
        break;
    case 'PUT':
        $api->updateClientById($id);
        break;
    case 'DELETE':
        $api->deleteClientById($id);
        break;
    default:
        http_response_code(400);
        echo json_encode(array("error" => "Method not allowed."));
}