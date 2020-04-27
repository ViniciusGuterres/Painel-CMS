<?php
require_once "connection.php";
class EmployeesDao {

    public function create($employees) {
        $sql = "INSERT INTO tb_equipe(name, description) VALUES (?, ?)";
        $stmt = Connection::conn() -> prepare($sql);
        $stmt -> bindValue(1, $employees->getName());
        $stmt -> bindValue(2, $employees->getDescription());
        $stmt -> execute();
    }

    public function read() {

    }

    public function update() {

    }

    public function delete() {

    }
}