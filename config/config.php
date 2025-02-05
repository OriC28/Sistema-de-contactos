<?php

return [
    "host" => "localhost",
    "port" => 3306,
    "dbname" => "",
    "username" => "root",
    "password" => "",
    "charset" => "utf8",
    "options" => [
        PDO::ATTR_EMULATE_PREPARES => FALSE, 
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
];