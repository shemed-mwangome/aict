<?php

namespace App;

use PDO;
use Exception;


require "config.php";
class DataBase
{

    private $host;
    private $username;
    private $password  ;
    private $database  ;

    private $dbHandler;
    private $statement;
    private $error;

    public function __construct()
    {
        $this->host = DB_HOST;
        $this->username = DB_USER;
        $this->password = DB_PASSWORD;
        $this->database = DB_NAME;
    }

    public function connect()
    {
        $conn = "mysql:host=$this->host;dbname=$this->database;charset=utf8";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->dbHandler = new PDO($conn, $this->username, $this->password, $options);
        } catch (Exception $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
        return $this->dbHandler;
    }
}
