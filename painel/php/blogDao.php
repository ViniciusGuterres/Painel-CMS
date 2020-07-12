<?php

class BlogDao {

    public function create($blog) {
        $sql = "INSERT INTO txt_blog(titulo, text) VALUE (?, ?)";
        $stmt = Connection::conn() -> prepare($sql);
        $stmt -> bindValue(1, $blog ->getTitle());
        $stmt -> bindValue(2, $blog -> getText());
        $stmt -> execute();
    }

    public function read() {
        $sql = "SELECT * FROM txt_blog";
        $stmt = Connection::conn() -> prepare($sql);
        $stmt -> execute();
    
        if ($stmt -> rowCount() > 0 ) {
        $result = $stmt -> fetchAll(\PDO::FETCH_ASSOC);
        return $result;
        }

        else {
            return [];
        }
    }
}