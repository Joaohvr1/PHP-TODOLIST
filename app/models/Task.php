<?PHP
    require_once('./Database.php');


    class Task{
        private $conn;

        private $table_name = "task";
        
        public function __construct($db){
            $this->conn = $db; 

        }


        public function crateTask($titulo, $tarefa, $data){
            session_start();

            if(!isset($_SESSION["usuario_logado"])){
                header("location: index.php");
            }
        }
    }

?>