<?php

require("../config/config.php");

define("HOST", $config["mysql"]["host"]);
define("USERNAME", $config["mysql"]["username"]);
define("PASSWORD", $config["mysql"]["password"]);
define("DATABASE", $config["mysql"]["database"]);

class Database
{

    

    private $host = HOST;
    private $username = USERNAME;
    private $password = PASSWORD;
    private $database = DATABASE;
    private $pdo = NULL;

    protected function connect()
    {
        $dsn = "mysql:host=$this->host;dbname=$this->database;charset=utf8";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->pdo = new PDO($dsn, $this->username, $this->password, $options);
        } catch (Exception $e) {
            echo "Could not connect to the Database " . $e->getMessage();
        }
        return $this->pdo;
    }
}
