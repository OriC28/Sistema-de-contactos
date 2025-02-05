<?php

class Connection{
    private $conn;
    private $host;
    private $port;
    private $dbname;
    private $username;
    private $password;
    private $charset;
    private $options;

    public function __construct(){
        $this->conn = null;
    }

    public function connect(){

    }

    public function isSetConnection(){
        
    }

    public function close(){

    }
}