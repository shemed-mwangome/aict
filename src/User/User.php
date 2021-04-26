<?php

namespace App\User;

use lastInsertId;

class User
{
    private $db;

    public function __construct()
    {
        $this->db = new \App\DataBase();
    }


    public function getUsers()
    {
        $sql = "SELECT * FROM particulars";
        $this->db->query($sql);
        return $this->db->resultSet();
    }

    public function getUser($search)
    {
        $sql = "SELECT * FROM particulars WHERE phone_no = :phone_no";
        // $phone = "%$search%";
        $this->db->query($sql);
        $this->db->bind(':phone_no', $search);
        return $this->db->single();
    }
    public function loadUser($user_id)
    {
        $sql = "SELECT * FROM particulars WHERE id = :id";
        // $phone = "%$search%";
        $this->db->query($sql);
        $this->db->bind(':id', $user_id);
        return $this->db->single();
    }

    public function registerUser($data)
    {
        $sql = "INSERT INTO particulars (
            fullname, gender, date_of_birth, address, phone_no, email, photo, marital_status, parent_name ) VALUES (?,?,?,?,?,?,?,?,?)";

        $values = array(
            $data["fullname"],
            $data["gender"],
            $data["dob"],
            $data["address"],
            $data["phone_no"],
            $data["email"],
            $data["photo_path"],
            $data["marital_status"],
            $data["parent_name"]
        );

        $this->db->query($sql);
        return $this->db->execute($values);
    }

    public function registerMarriage($id, $data)
    {
        $sql = "INSERT INTO spouse (
            particulars_id, fullname, date_of_marriage) VALUES (?,?,?)";

        $values = array(
            $id,
            $data["spouse_name"],
            $data["date_marriage"]
        );

        $this->db->query($sql);
        return $this->db->execute($values);
    }
    public function registerEmployement($id, $data)
    {
        $sql = "INSERT INTO employment (
            particulars_id, employer, skills) VALUES (?,?,?)";

        $values = array(
            $id,
            $data["employer"],
            $data["skills"]
        );

        $this->db->query($sql);
        return $this->db->execute($values);
    }
    public function registerResidence($id, $data)
    {
        $sql = "INSERT INTO residence (
            particulars_id, location, street, house_no) VALUES (?,?,?,?)";

        $values = array(
            $id,
            $data["location"],
            $data["street"],
            $data["house_no"]
        );

        $this->db->query($sql);
        return $this->db->execute($values);
    }

    public function lastId()
    {
        return $this->db->lastInsertId();
    }

    public function rowCount()
    {
        return $this->db->rowCount();
    }

    public function getChildren($parent_id)
    {

        $sql = "SELECT * FROM children WHERE particulars_id = :particulars_id";
        $this->db->query($sql);
        $this->db->bind(':particulars_id', $parent_id);
        return $this->db->resultSet();
    }

    public function registerChildren($data)
    {
        $sql = "INSERT INTO children(particulars_id, fullname, age, gender, is_staying_home) VALUES (:particulars_id, :fullname, :age, :gender, :is_staying_home)";
        $this->db->query($sql);
        $this->db->bind('particulars_id', $data["parent_id"]);
        $this->db->bind('fullname', $data["child_name"]);
        $this->db->bind('age', $data["child_age"]);
        $this->db->bind('gender', $data["child_gender"]);
        $this->db->bind('is_staying_home', $data["child_location"]);
        return $this->db->execute();
    }

    public function registerReligion($data)
    {
        return print_r($data);
        // $sql = "INSERT INTO children(particulars_id, fullname, age, gender, is_staying_home) VALUES (:particulars_id, :fullname, :age, :gender, :is_staying_home)";
        // $this->db->query($sql);
        // $this->db->bind('particulars_id', $data["parent_id"]);
        // $this->db->bind('fullname', $data["child_name"]);
        // $this->db->bind('age', $data["child_age"]);
        // $this->db->bind('gender', $data["child_gender"]);
        // $this->db->bind('is_staying_home', $data["child_location"]);
        // return $this->db->execute();
    }
}
