<?php
require_once "dbconnection.php";

class Cadastrar extends Connection{

    public function cadastrar() {

        if(isset($_POST["cadastrar_equipe"])) {
            $conn = new PDO("mysql:host=$this->server;dbname=$this->db",$this->user, $this->password);
            $teamWorker = $_POST["team-worker"];
            $about = $_POST["about"];
            $sql = $conn -> prepare("INSERT INTO tb_equipe VALUE (null, ?, ?)");
            $sql -> execute(array($teamWorker, $about));
        }
        else {
            echo 'Form not working';
        }

    }
}
