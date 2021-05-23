<?php

namespace App;

use PDO;
use PDOException;


require "config.php";
class DataBase
{

    private $host = DB_HOST;
    private $username = DB_USER;
    private $password = DB_PASSWORD;
    private $database = DB_NAME;

    private $dbHandler;
    private $statement;
    private $error;

    public function __construct()
    {
        $conn = "mysql:host=$this->host;dbname=$this->database;charset=utf8";
        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        try {
            $this->dbHandler = new PDO($conn, $this->username, $this->password, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    // Prepare statement
    public function query($sql)
    {
        $this->statement = $this->dbHandler->prepare($sql);
    }

    // Bind data
    public function bind($parameter, $value, $type = null)
    {
        switch (is_null($type)) {
            case is_int($value):
                $type = PDO::PARAM_INT;
                break;
            case is_bool($value):
                $type = PDO::PARAM_BOOL;
                break;
            case is_null($value):
                $type = PDO::PARAM_NULL;
                break;
            default:
                $type = PDO::PARAM_STR;
        }
        $this->statement->bindValue($parameter, $value, $type);
    }

    public function execute($data = null){
        return $this->statement->execute($data);
    }

    public function resultSet(){
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function single(){
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_OBJ);
    }

    public function rowCount(){
        return $this->statement->rowCount();
    }

    public function lastInsertId(){
        return $this->dbHandler->lastInsertId();
    }


}
