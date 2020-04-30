<?php

class EmployeesDao {

    public function create($employees) {
        $sql = "INSERT INTO tb_equipe(name, role, description) VALUES (?, ?, ?)";
        $stmt = Connection::conn() -> prepare($sql);
        $stmt -> bindValue(1, $employees->getName());
        $stmt -> bindValue(2, $employees->getRole());
        $stmt -> bindValue(3, $employees->getDescription());
        $stmt -> execute();
    }

    public function read() {
        $sql = "SELECT * FROM tb_equipe";
        $stmt = Connection::conn() -> prepare($sql);
        $stmt -> execute();
        // surching for results
        if ($stmt -> rowCount() > 0 ) {
            $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }

    public function update() {

    }

    public function delete() {

    }
}