<?php

class User{
    public $id;
    public $fname;
    public $mname;
    public $lname;
    public $email;
    public $password;
    public $address;
    public $contact;
    public $gender;
    public $prof_pic;
    public $role_id;
    public $auth;

    protected $conn;

    public function __construct(){

        if(!isset($_SESSION))
        {
            session_start();
        }

        if(!isset($_SESSION['usermail']) || empty($_SESSION['usermail'])){

            $this->auth = false;

        }
        else{
            $this->auth = true;
        }

    }

    public function getByRole($role){

        $role_ids = [
            "admin" => 1,
            "manager" => 2,
            "clerk" => 3,
            "customer" => 4
        ];

        $this->createConnection();
        $sql = "SELECT u.*, r.name FROM user u INNER JOIN role r ON u.role_id = r.id WHERE u.role_id = ".$role_ids[$role]."";
        $result = $this->conn->query($sql);
        $data = [];

        if (!$result) {
            trigger_error('Invalid query: ' . $this->conn->error);
        }

        if ($result->num_rows > 0) {
            // output data of each row
            while( $row = $result->fetch_assoc() ){
                array_push($data, $row);
            }
            return $data;

        } else {
            $result = [];
            return $result;
        }

        $this->closeConnection();

    }

    public function getByEmail($email){

        $this->createConnection();
        $sql = "SELECT u.*, r.name FROM user u INNER JOIN role r ON u.role_id = r.id WHERE u.email ='".$email."'";
        $result = $this->conn->query($sql);
        $data = [];

        if (!$result) {
            trigger_error('Invalid query: ' . $this->conn->error);
        }

        if ($result->num_rows > 0) {
            // output data of each row
            while( $row = $result->fetch_assoc() ){
                array_push($data, $row);
            }
            return $data;

        } else {
            $result = [];
            return $result;
        }

        $this->closeConnection();

    }

    public function getById($id){

        $this->createConnection();
        $sql = "SELECT u.*, r.name FROM user u INNER JOIN role r ON u.role_id = r.id WHERE u.id ='".$id."'";
        $result = $this->conn->query($sql);
        $data = [];

        if (!$result) {
            trigger_error('Invalid query: ' . $this->conn->error);
        }

        if ($result->num_rows > 0) {
            // output data of each row
            while( $row = $result->fetch_assoc() ){
                array_push($data, $row);
            }
            return $data;

        } else {
            $result = [];
            return $result;
        }

        $this->closeConnection();

    }

    public function save($model){

        $this->createConnection();

        $sql = "INSERT INTO user (fname, mname, lname, email, password, address, contact, gender, prof_pic, role_id)
        VALUES ('".$model->fname."', '".$model->mname."', '".$model->lname."', '".$model->email."', '".$model->password."', '".$model->address."', '".$model->contact."', '".$model->gender."', '".$model->prof_pic."', ".$model->role_id.")";

        $result = $this->conn->query($sql);
        $data = [];

        if (!$result) {
            trigger_error('Invalid query: ' . $this->conn->error);
        }

        $model->id = $this->conn->insert_id;

        $this->closeConnection();

        return $model;

    }

    public function login($email){

    }

    public function createConnection(){

        $database = new DatabaseConn;
        $this->conn = $database->connection;

    }

    public function closeConnection(){
        $this->conn->close();
    }
}

?>
