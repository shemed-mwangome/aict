<?php

namespace App\User;

class Operator
{
    private $db;

    public function __construct()
    {
        $this->db = new \App\DataBase();
    }

    public function login($username, $password){
        $sql = "SELECT * FROM users WHERE username = :username";

        $this->db->query($sql);
        $this->db->bind(':username', $username);
        return $this->db->single();
    }
}
