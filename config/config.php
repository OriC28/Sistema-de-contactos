<?php

/**
 * Database Configuration File
 *
 * This file contains the configuration settings for connecting to the MySQL database.
 * It defines the host, port, database name, username, password, charset, and PDO options.
 *
 * @package    ContactSystem\Config
 * @author     Oriana Colina <orianacolina.perea@gmail.com>
 * @version    1.0.0
 * @license    MIT
 */

return [
    /**
     * The hostname of the database server.
     *
     * @var string
     */
    "host" => "localhost",

    /**
     * The port number for the database connection.
     *
     * @var int
     */
    "port" => 3306,

    /**
     * The name of the database to connect to.
     *
     * @var string
     */
    "dbname" => "contact_system",

    /**
     * The username for the database connection.
     *
     * @var string
     */
    "username" => "root",

    /**
     * The password for the database connection.
     *
     * @var string
     */
    "password" => "Ori31525588$$.",

    /**
     * The character set used for the database connection.
     *
     * @var string
     */
    "charset" => "utf8",

    /**
     * PDO options for the database connection.
     *
     * @var array
     */
    "options" => [
        /**
         * Disable emulation of prepared statements.
         *
         * @var bool
         */
        PDO::ATTR_EMULATE_PREPARES => false,

        /**
         * Set the error mode to throw exceptions on errors.
         *
         * @var int
         */
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ],
];