<?php

class homeController extends controller {

    public function index() {
        if (empty($_SESSION['cLogin'])) {
            header("Location: " . BASE_URL . "login");
        }
        $dados = array(
        );
        $this->loadTemplate("home", $dados);    //carrega a view do home
    }

}
