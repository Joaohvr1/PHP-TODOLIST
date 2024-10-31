<?php
require_once './app/controller/UserController.php';
require_once'./app/controller/HomeController.php';
$url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : '';

switch ($url) {

    case 'login':
        $controller = new UserController();
        $controller->logar();
        break;
    
    case 'signup':
        $controller = new UserController();
        $controller->cadastrarUser();
        break;
    
    case 'home':
        session_start();
        if (!isset($_SESSION['usuario_logado'])) {
            $_SESSION['message'] = "Por favor, faça login para acessar o sistema.";
            $_SESSION['alertType'] = "danger";
            header("Location: index.php?url=login"); 
            exit();
        }
        $controller = new HomeController();
        $controller->index();
        break;
        

    default:
        $controller = new UserController();
        $controller->logar();
        break;

}
