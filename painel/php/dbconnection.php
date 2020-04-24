<?php

class Connection {

    protected $server;
    protected $db;
    protected $user;
    protected $password;

    public function __Construct() {
        $this -> server = "localhost:3325";
        $this -> db = "cmd_project";
        $this -> user = "root";
        $this -> password = "";
    }

    public function dbConn() {
        try {
            $conn = new PDO("mysql:host=$this->server;dbname=$this->db",$this->user, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // insert workers into db
            if(isset($_POST["cadastrar_equipe"])) {
                $teamWorker = $_POST["team-worker"];
                $about = $_POST["about"];
                $sql = $conn -> prepare("INSERT INTO tb_equipe VALUES (null, ?, ?)");
                $sql -> execute(array($teamWorker, $about));

            }
            else {
                echo 'Form not working';
            }
        }
        catch (PDOException $e) {
            throw new PDOException($e); 
            echo $e -> getMessage();
        }

    }

}