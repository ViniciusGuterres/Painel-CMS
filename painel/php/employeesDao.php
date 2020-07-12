<?php

class EmployeesDao {

    public function create($employees) {
        $sql = "INSERT INTO tb_equipe(name, role, description, image, data) VALUES (?, ?, ?)";
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

    public function delete($id) {
        $sql = "DELETE FROM tb_equipe WHERE id = ?";
        $stmt = Connection::conn() -> prepare($sql);
        $id = (int)$id;
        $stmt -> bindValue(1, $id);
        $stmt -> execute();
        echo "<h1>Mundi wornking</h1>";
        var_dump($id);
    }
}