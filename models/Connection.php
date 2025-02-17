<?php

/**
 * Class to set the connection with the database.
 *
 * This class handles the creation and management of a PDO database connection.
 * It validates the configuration parameters and provides methods to connect to
 * and disconnect from the database.
 *
 * @package    ClientAPI\Connection
 * @author     Oriana Colina <orianacolina.perea@gmail.com>
 * @version    1.0.0
 * @license    MIT
 */
class Connection
{
    /**
     * The PDO database connection instance.
     *
     * @var PDO|null
     */
    protected $conn;

    /**
     * The database host.
     *
     * @var string
     */
    private $host;

    /**
     * The database port.
     *
     * @var int
     */
    private $port;

    /**
     * The database name.
     *
     * @var string
     */
    private $dbname;

    /**
     * The database username.
     *
     * @var string
     */
    private $username;

    /**
     * The database password.
     *
     * @var string
     */
    private $password;

    /**
     * The character set for the database connection.
     *
     * @var string
     */
    private $charset;

    /**
     * The PDO options for the database connection.
     *
     * @var array
     */
    private $options;

    /**
     * Connection constructor.
     *
     * Initializes the connection parameters by loading the configuration file
     * and validating the required parameters.
     *
     * @throws Exception If any required configuration parameter is missing or empty.
     */
    public function __construct()
    {
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
     * Verify if the required configuration parameters are set.
     *
     * Validates that all required parameters are present and not empty in the configuration array.
     *
     * @param array $config The configuration array with database parameters.
     * @return void
     * @throws Exception If any required parameter is missing or empty.
     */
    private function validateParametersConfig(array $config): void
    {
        $parameters = ["host", "port", "dbname", "username", "password", "charset", "options"];
        foreach ($parameters as $key) {
            if (!isset($config[$key]) || empty($config[$key])) {
                throw new Exception("Parameter $key is not set.", 1);
            }
        }
    }

    /**
     * Set the connection with the database.
     *
     * Establishes a PDO connection to the database using the configured parameters.
     * If the connection is already established, it returns the existing connection.
     *
     * @return PDO The PDO database connection instance.
     * @throws Exception If the connection to the database fails.
     */
    public function connect(): PDO|Exception
    {
        try {
            if (is_null($this->conn)) {
                $dsn = "mysql:dbname=$this->dbname;host=$this->host;port=$this->port;charset=$this->charset;";
                $this->conn = new PDO($dsn, $this->username, $this->password, $this->options);
            }
        } catch (PDOException $e) {
            throw new Exception("Error: " . $e->getMessage(), 1);
        }
        return $this->conn;
    }

    /**
     * Close the connection with the database.
     *
     * Closes the PDO connection by setting it to null.
     *
     * @return void
     */
    public function close(): void
    {
        if (!is_null($this->conn)) {
            $this->conn = null;
        }
    }
}