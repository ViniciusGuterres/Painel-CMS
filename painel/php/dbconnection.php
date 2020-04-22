<?php

class Connection {

    private $server = "localhost:3325";
    private $db = "cmd_project";
    private $user = "root";
    private $password = "";

    public function dbConn() {

        try {
            $conn = new PDO("mysql:host=$this->server;dbname=$this->db",$this->user, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            echo 'connection sucess';
        }
        catch (PDOException $e) {
            echo $e -> getMessage();
        }


    }


}