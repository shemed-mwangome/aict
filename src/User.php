<?php

class User extends Database
{
    private $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->connect();

        return $this->conn;
    }

    public function registerUser($userdata)
    {
        $sql = "INSERT INTO particulars 
        (`fullname`, `gender`, `date_of_birth`, `address`, `phone_no`, `email`, `photo`, `marital_status`, `parent_name` ) VALUES (?,?,?,?,?,?,?,?,?)";

        $stmt = $this->conn->prepare($sql);
        $data = [
            $userdata["fullname"], $userdata["gender"], $userdata["dob"], $userdata["address"],
            $userdata["phone_no"], $userdata["email"], $userdata["photo_path"],
            $userdata["marital_status"], $userdata["parent_name"]
        ];
        $stmt->execute($data);
        $lastId = $this->conn->lastInsertId();
        return $lastId;
    }

    public function registerEmployement($userdata, $id)
    {
        $sql = "INSERT INTO employment
        (`particulars_id`, `employer`, `skills`) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $data = [
            $id, $userdata["employer"], $userdata["skills"]
        ];
        $stmt->execute($data);
    }

    public function registerResidence($userdata, $id)
    {
        $sql = "INSERT INTO residence
        (`particulars_id`, `location`, `street`, `house_no`) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $data = [
            $id, $userdata["location"], $userdata["street"], $userdata["house_no"]
        ];
        $stmt->execute($data);
    }

    public function registerSpouse($userdata, $id)
    {
        $sql = "INSERT INTO spouse
        (`particulars_id`, `fullname`, `date_of_marriage`) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $data = [
            $id, $userdata["spouse_name"], $userdata["date_marriage"]
        ];
        $stmt->execute($data);
    }
}
