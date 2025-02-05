<?php

require_once "controllers/contactController.php";

function validateParameters(array $parameters, string $errorMessage){
    foreach ($parameters as $key) {
        if(!isset($_GET[$key]) || empty($_GET[$key])){
            http_response_code(404);
            throw new Exception($errorMessage, 1);
        }
    }
    return true;
}

try{
    $errorMessage = "Ruta no encontrada (Error 404).";
    validateParameters(['controller', 'action'], $errorMessage);
    $controllerName = ucfirst($_GET['controller'])."Controller";
    $methodName = $_GET['action'];
    $controllerPath = "controllers/$controllerName.php";
    if(file_exists($controllerPath)){
        $controllerObject = new $controllerName();
        if(method_exists($controllerObject, $methodName)){
            $controllerObject->$methodName();
        }
    }
    http_response_code(404);
    throw new Exception($errorMessage, 1);
    
}catch (\Throwable $th){
    $th->getMessage();
}