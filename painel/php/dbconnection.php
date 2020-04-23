<?php

class Connection {

    protected $server = "localhost:3325";
    protected $db = "cmd_project";
    protected $user = "root";
    protected $password = "";
    protected static $conn;

    public function dbConn() {
        try {
            $conn = new PDO("mysql:host=$this->server;dbname=$this->db",$this->user, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e) {
            throw new PDOException($e); 
            echo $e -> getMessage();
        }

    }

}