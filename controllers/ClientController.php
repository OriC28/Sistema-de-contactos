<?php

require_once __DIR__."/../models/ClientModel.php";

class ClientController{
    private $model;
    public function __construct()
    {
        $this->model = new ClientModel();
    }

    public function getClientById(int $id)
    {
        $client = $this->model->getClientById($id);
        echo json_encode($client);
    }
    public function saveClient()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $id = $this->model->saveClient($data);
        echo json_encode($id);
    }
    public function updateClientById(int $id)
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $done = $this->model->updateClientById($id, $data);
        if($done){
            echo json_encode(array('message' => 'Client updated successfully.'));
        }else{
            http_response_code(404);
            echo json_encode(array('error' => 'Client not found'));
        }
    }

    public function deleteClientById(int $id)
    {
        $done = $this->model->deleteClientById($id);
        if($done){
            echo json_encode(array('message' => 'Client deleted successfully.'));
        }else{
            http_response_code(404);
            echo json_encode(array('error' => 'Client not found.'));
        }
    }

    public function getClientsPaginate(int $currentPage){
        $perPage = 5;
        $data = $this->model->getClientsPaginate($perPage, $currentPage);
        echo json_encode($data);
    }
}