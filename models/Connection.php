<?php

/**
 * Class to set the connection with the database
 */

class Connection{
    protected $conn;
    private $host;
    private $port;
    private $dbname;
    private $username;
    private $password;
    private $charset;
    private $options;
    
    public function __construct(){
        $config = require_once "../config/config.php"; 
        $this->validateParametersConfig($config);
        
        $this->conn = null;
        $this->host = $config["host"];
        $this->port = $config["port"];
        $this->dbname = $config["dbname"];
        $this->username = $config["username"];
        $this->password = $config["password"];
        $this->charset = $config["charset"];
        $this->options = $config["options"];
    }
    /**
     * Verify if the parameters are setted
     * @param array $config The array with the parameters
     * @return void
     * @throws Exception If any parameter is not setted
     */
    private function validateParametersConfig(array $config):void{
        $parameters = ["host", "port", "dbname", "username", "password", "charset", "options"];
        foreach($parameters as $key){
            if(!isset($config[$key]) || empty($config[$key])){
                throw new Exception("Parameter $key is not setted.", 1);
            }
        }
    }
    /**
     * Set the connection with the database
     * @return PDO The connection with the database 
     */
    public function connect():PDO|Exception{
        try{
            if(is_null($this->conn)){
                $dsn = "mysql:dbname=$this->dbname;host=$this->host;port=$this->port;charset=$this->charset;";
                $this->conn = new PDO($dsn, $this->username, $this->password, $this->options);
            }
        }catch(PDOException $e){
            throw new Exception("Error: ".$e->getMessage(), 1);
        }
        return $this->conn;
    }
    /**
     * Close the connection with the database
     * @return void
     */
    public function close():void{
        if(!is_null($this->conn)){
            $this->conn = null;
        }
    }
}