<?php

require_once("./app/models/Database.php");
require_once("./app/models/User.php");

class UserController {
    private $model;

    
    public function __construct(){
        $data = new Database();
        $db = $data->getConnection();
        $this->model = new User($db);
    }

    public function cadastrarUser(){
        $message = ""; 
        $isValidForm = false;
        $alertType = "info";
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nome = trim($_POST['nome']);
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);
            $email = trim($_POST['email']);
            $data = trim($_POST['dataNascimento']);
            if(empty($nome)){
                $message = "Nome não pode ser nulo ou vazio";
                $alertType = "danger";
            } elseif($this->model->validaUsername($username) > 0) {
                $message = "Usuário já cadastrado";
                $alertType = "warning";
            } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $message = "Email inválido";
                $alertType = "warning";
            } elseif($this->model->validaEmail($email) > 0) {
                $message = "Email já cadastrado";
                $alertType = "warning";
            } else {
                $dataFormatada = DateTime::createFromFormat("Y-m-d", $data);
                if($dataFormatada){
                    $dataFormatada = $dataFormatada->format("Y-m-d");
                } else {
                    $message = "Data de nascimento invalida: Data de nascimento precisa ser no formato dd/mm/yyyy";
                    $alertType = "danger";

                    include'./app/view/CadastraUsuario.php';
                    return;

                }

                $this->model->cadastrarUser($nome, $username, $password, $email, $dataFormatada);
                $message = "Usuário cadastrado com sucesso!";
                $alertType = "success";
                $isValidForm = true;
            }
        }
        include './app/view/CadastraUsuario.php';
    
    }

    public function logar() {
        session_start();
        $message = "";
        $alertType = "info";

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $username = trim($_POST["username"]);
            $password = trim($_POST["password"]);

            if (empty($username) || empty($password)) {
                $message = "Login e/ou senha não podem ser nulos";
                $alertType = "danger";
            } else {
                $user = $this->model->login($username, $password);
                if ($user) {
                    $message = "Login efetuado com sucesso";
                    $alertType = "success";
                    $_SESSION['usuario_logado'] = $user;
                    
                    header("location: index.php?url=home");
                    exit();
                } else {
                    $message = "Usuário ou senha incorreta.";
                    $alertType = "danger";
                }
            }
        }

        include "./app/view/Login.php";
    }
}