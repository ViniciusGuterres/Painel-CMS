<?php
require_once "dbconnection.php";

class Cadastrar {

    public function cadastrar() {

        if(isset($_POST['cadastrar_equipe'])) {
            echo 'true';
        }
        else {
            echo 'not working';
        }

    }
}