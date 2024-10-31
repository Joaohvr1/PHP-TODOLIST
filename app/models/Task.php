<?PHP
    require_once('./app/models/Database.php');


    class Task{
        private $conn;

        private $table_name = "task";
        
        public function __construct($db){
            $this->conn = $db; 

        }


        public function createTask($titulo, $tarefa, $data, $usuarios_id){
            $sql = "INSERT INTO ".$this->table_name. "(titulo, tarefa, data, usuarios_id) VALUES (:titulo, :tarefa, :data, :usuarios_id)";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":titulo", $titulo, PDO::PARAM_STR);
            $stmt->bindParam(":tarefa", $tarefa, PDO::PARAM_STR);
            $stmt->bindParam(":data", $data, PDO::PARAM_STR);
            $stmt->bindParam(":usuarios_id", $usuarios_id, PDO::PARAM_INT);

            $stmt->execute();
        }

        public function procuraTaskPorTitulo($titulo, $usuarios_id){
            $sql = "SELECT FROM".$this->table_name. "WHERE titulo LIKE :titulo AND :usuarios_id";

            $stmt = $this->conn->prepare($sql);
            $stmt-> bindParam(":titulo", $titulo, PDO::PARAM_STR);
            $stmt->bindParam(":usuarios_id", $usuarios_id, PDO::PARAM_STR);

            $stmt->execute();

            $result = $stmt->get_result();
            return $result->fetch_assoc();
        }
    }