<?php

class Employees {

    public $name;
    public $description;

    function getName() {
        return $this -> name;
    }

    // will valited the form input name
    function setName($no) {
        $this -> name = $no;
    }

    function getDescription() {
        return $this -> description;
    }

    function setDescription($de) {
        $this -> description = $de;
    }

    
        
}