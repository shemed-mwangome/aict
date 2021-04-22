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
        $sql = "SELECT * FROM particulars WHERE phone_no LIKE :phone_no";
        $phone = "%$search%";
        $this->db->query($sql);
        $this->db->bind(':phone_no', $phone);
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
        $this->db->execute($values);
        return $this->db->lastInsertId();
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
    public function registerMarriage($id, $data)
    {
        $sql = "INSERT INTO spouse (
            particulars_id, fullname, date_of_marriage) VALUES (?,?,?)";

        $values = array(
            $id,
            $data["fullname"],
            $data["date_marriage"]
        );

        $this->db->query($sql);
        return $this->db->execute($values);
    }
}
