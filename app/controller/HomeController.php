<?php

require_once("./app/models/Database.php");
require_once("./app/models/User.php");
require_once("./app/models/Task.php");

class HomeController {

    private $model;

    public function __construct() {
        $data = new Database();
        $db = $data->getConnection();
        $this->model = new Task($db);
    }

    public function index(){
        include "./app/view/home.php";
    }

    public function createTask() {
        $message = "";
        $alertType = "info";
        session_start();

        if (!isset($_SESSION["usuario_logado"])) {
            header("location: login.php");
            exit();
        }

        $user_id = $_SESSION["usuario_logado"]["id"];

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $titulo = trim($_POST['titulo']);
            $tarefa = trim($_POST['tarefa']);
            $data = trim($_POST['dataTask']);

            if (empty($titulo) || empty($tarefa)) {
                $message = "Título e tarefa não podem ser nulos ou vazios.";
                $alertType = "danger";
            } else {
                $formatData = DateTime::createFromFormat("Y-m-d", $data);
                if ($formatData) {
                    $formatData = $formatData->format("Y-m-d");
                    $this->model->createTask($titulo, $tarefa, $formatData, $user_id);
                    $message = "Tarefa criada com sucesso";
                    $alertType = "success";
                } else {
                    $message = "Data precisa estar no formato dd/mm/yyyy";
                    $alertType = "danger";
                }
            }

            include("./app/view/home.php");
        }
    }
}
