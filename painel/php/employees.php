<?php

class Employees {

    public $name;
    public $description;
    public $role;

    function getName() {
        return $this -> name;
    }

    // will validated the form input name
    function setName($no) {
        $this -> name = $no;
    }

    function getDescription() {
        return $this -> description;
    }

    function setDescription($de) {
        $this -> description = $de;
    }

    function getRole() {
        return $this -> role;
    }

    function setRole($ro) {
        $this -> role = $ro;
    }
  
}