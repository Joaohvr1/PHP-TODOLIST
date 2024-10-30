<?php

require_once("./app/models/Database.php");
require_once("./app/models/User.php");

class HomeController {
    public function index(){
        include "./app/view/home.php";
    }
}
?>
