<?php

namespace App\User;



class User
{
    private $db;

    public function __construct()
    {
        $this->db = new \App\DataBase();
    }


    public function getUsers(){
        $sql = "SELECT * FROM particulars";
        $this->db->query($sql);
        $result = $this->db->resultSet();
        return $result;
    }
    
}
