<?php

require_once("Database.php");

class User {
    private $conn;
    private $table_name = "usuarios";

    public function __construct($db){
        $this->conn = $db;
    }

    public function cadastrarUser($nome, $username, $password, $email, $data) {
        
        $sql = "INSERT INTO " . $this->table_name . "(nome, username, password, email, dataNascimento) VALUES (:nome, :username, :password, :email, :data)";
        $stmt = $this->conn->prepare($sql);

        $password = password_hash($password, PASSWORD_BCRYPT);

        $stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
        $stmt->bindParam(":username", $username, PDO::PARAM_STR);
        $stmt->bindParam(":password", $password, PDO::PARAM_STR);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->bindParam(":data", $data, PDO::PARAM_STR);

        return $stmt->execute();
    }


    public function validaUsername($username){
        $sql = "SELECT * FROM " . $this->table_name . " WHERE username LIKE :username";

        $stmt   = $this->conn->prepare($sql);
        $stmt->bindValue(":username", $username, PDO::PARAM_STR);

        $stmt->execute();
        return $stmt->fetchColumn() > 0;

    }

    public function validaEmail($email){
        $sql = "SELECT * FROM " . $this->table_name . " WHERE email LIKE :email";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetchColumn() > 0;

    }


    public function login($username, $password) {
        $sql = "SELECT * FROM " . $this->table_name . " WHERE username = :username";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":username", $username, PDO::PARAM_STR);
        $stmt->execute();
        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user && password_verify($password, $user['password'])) {
            return $user; 
        }
        return false; 
    }

}
