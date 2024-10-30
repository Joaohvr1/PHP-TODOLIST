<?php

require_once("./Database.php");

class Login {
    private $conn;
    private $table_name = "login";
    private $username = "";
    private $password = "";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getUsername(){
        return $this->username;
    }

    public function setUsername($username){
        $this->username = $username;
    }

    public function getPassword(){
        return $this->password;
    }
}
?>
