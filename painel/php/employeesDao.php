<?php
require_once "connection.php";
class EmployeesDao {

    public function create($n,$d) {
        $sql = "INSERT INTO tb_equipe(name, description) VALUES (?, ?)";
        $stmt = Connection::conn() -> prepare($sql);
        $stmt -> bindValue(1, $n);
        $stmt -> bindValue(2, $d);
        $stmt -> execute();
    }

    public function read() {

    }

    public function update() {

    }

    public function delete() {

    }
}