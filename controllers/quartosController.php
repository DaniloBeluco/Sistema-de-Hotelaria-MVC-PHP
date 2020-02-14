<?php

class quartosController extends controller {

    public function index() {
        if (empty($_SESSION['cLogin'])) {
            header("Location: " . BASE_URL . "login");
        }
        $dados = array();
        $q = new Quartos();
        if (!isset($_GET['p']) || empty($_GET['p'])) {
            $atual = 1;
        } else {
            $atual = $_GET['p'];
        }
        $total = $q->getTotal();
        $items_por_pagina = 2;
        $paginas = ceil($total / $items_por_pagina);

        $offset = ($items_por_pagina * $atual) - $items_por_pagina;
        $qua = $q->getQuartos($offset, $items_por_pagina);
        $dados['quartos'] = $qua;
        $dados['paginas'] = $paginas;

        $this->loadTemplate("quartos", $dados);    //carrega a view do home
    }

    public function adicionar() {
        if (empty($_SESSION['cLogin'])) {
            header("Location: " . BASE_URL . "login");
        }
        $dados = array();
        $c = new Quartos();


        if (isset($_FILES['foto']) && !empty($_FILES['foto']['tmp_name'])) {

            /* Tipos de arquivos permitidos para Envio */
            $permitidos = array('image/jpeg', 'image/jpg', 'image/png');

            if (in_array($_FILES['foto']['type'], $permitidos)) {

                $nome_foto = md5(time() . rand(0, 999)) . '.jpg';

                move_uploaded_file($_FILES['foto']['tmp_name'], 'assets/images/quartos/' . $nome_foto);
            }
        }



        if (!empty($_POST['nome'])) {
            $nome = addslashes($_POST['nome']);
            $capacidade = addslashes($_POST['capacidade']);
            $descricao = addslashes($_POST['descricao']);

            $c->cadastrar($nome, $capacidade, $nome_foto, $descricao);
            header("Location: ".BASE_URL."quartos");
        }
        $this->loadTemplate("adicionar-quarto", $dados);    //carrega a view do home
    }

}
