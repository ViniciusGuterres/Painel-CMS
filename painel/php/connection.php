<?php
// namespace php;
class Connection {
    
    public static $instance;

    // will try to connect to db cmd_project
    public function conn() {
        if(!isset(self::$instance)) {
            try {
                self::$instance = new PDO("mysql:host=localhost:3325;dbname=cmd_project",'root', '');
                self::$instance -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo 'connection alrigt';
            }
            catch(PDOException $e) {
                throw new PDOException;
                echo $e -> getMessage();
            }
        }
        return self::$instance;
    }
}



