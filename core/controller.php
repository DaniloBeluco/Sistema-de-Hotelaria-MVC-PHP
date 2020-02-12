<?php

class controller {   //ajudador

    public function loadView($viewName, $viewData = array()) {   //carrega o view que queremos
        extract($viewData);  //pega os indices e transfomra em uma variavel
        require 'views/' . $viewName . ".php";
    }

    public function loadTemplate($viewName, $viewData = array()) {
        require 'views/template.php';
    }

    public function loadViewInTemplate($viewName, $viewData = array()) {
        extract($viewData);
        require 'views/' . $viewName . '.php';
    }

}
