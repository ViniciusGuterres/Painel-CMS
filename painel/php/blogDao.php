<?php

class BlogDao {

    public function create($blog) {

        $sql = "INSERT INTO txt_blog(titulo, text) VALUE (?, ?)";
        $stmt = Connection::conn() -> prepare($sql);
        $stmt -> bindValue(1, $blog ->getTitle());
        $stmt -> bindValue(2, $blog -> getText());
        $stmt -> execute();
    }
}