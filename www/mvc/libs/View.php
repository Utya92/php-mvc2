<?php

class View {

    public function __construct() {

    }

    public function render($path) {
        require $_SERVER['DOCUMENT_ROOT'].'/mvc/views/'.$path.'/index.php';
    }
}