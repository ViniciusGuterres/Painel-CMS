<?php

class Blog {

    public $title;
    public $text;
    public $image;

    function setTitle($ti) {
        $this -> title = $ti;
    }

    function getTitle() {
        return $this -> title;
    }

    function setText($te) {
        $this -> text = $te;
    }

    function getText() {
        return $this -> text;
    }

    function setImage($im) {
        $this -> image = $im;
    }

    function getImage() {
        return $this -> image;
    }
}