<?php

require_once("config.php");
class Database
{

    private $host;
    private $username;
    private $password;
    private $database;
    private $pdo;

    function __construct()
    {
        global $config;
        $this->host  = $config["mysql"]["host"];
        $this->username = $config["mysql"]["username"];
        $this->password = $config["mysql"]["password"];
        $this->database = $config["mysql"]["database"];
    }

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
