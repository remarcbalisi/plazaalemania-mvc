<?php

class ActionHistory{

    public $id;
    public $description;
    public $action;
    public $table_id;
    public $table_name;
    public $user_id;

    protected $conn;

    public function save($model){

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
