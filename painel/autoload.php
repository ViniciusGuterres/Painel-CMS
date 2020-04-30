<?php
spl_autoload_register(function($classes) {
    require "php/$classes.php";
    }
);