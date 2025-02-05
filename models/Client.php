<?php 

class Client{
    private $firstName;
    private $secondName;
    private $firstLastName;
    private $secondLastName;
    private $email;
    private $phone;
    private $company;

    public function __construct(array $clientData){
        $this->firstName = $clientData['firstName'];
        $this->secondName = $clientData['secondName'];
        $this->firstLastName = $clientData['firstLastName'];
        $this->secondLastName = $clientData['secondLastName'];
        $this->email = $clientData['email'];
        $this->phone = $clientData['phone'];
        $this->company = $clientData['company'];
    }
}