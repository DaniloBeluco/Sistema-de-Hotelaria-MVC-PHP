<?php

class clientesController extends controller {

    public function index() {

        //logado na sessão
        if (empty($_SESSION['cLogin'])) {
            header("Location: " . BASE_URL . "login");
        }

        $dados = array();
        $c = new Clientes();


        //filtragem
        $filtros = array('nome' => '', 'cpf' => '');
        if (isset($_GET['filtro_nome'])) {
            $filtros['nome'] = $_GET['filtro_nome'];
        }
        if (isset($_GET['filtro_cpf'])) {
            $filtros['cpf'] = $_GET['filtro_cpf'];
        }



        //paginação
        if (!isset($_GET['p']) || empty($_GET['p'])) {
            $atual = 1;
        } else {
            $atual = $_GET['p'];
        }
        $total = $c->getTotal();
        $items_por_pagina = 5;
        $paginas = ceil($total / $items_por_pagina);
        $offset = ($items_por_pagina * $atual) - $items_por_pagina;

        //consulta sql
        $cli = $c->getClientes($offset, $items_por_pagina, $filtros);
        $dados['clientes'] = $cli;
        $dados['paginas'] = $paginas;

        $this->loadTemplate("clientes", $dados);    //carrega a view do home
    }

    public function adicionar() {
        if (empty($_SESSION['cLogin'])) {
            header("Location: " . BASE_URL . "login");
        }
        $dados = array();

        $c = new Clientes();

        if (!empty($_POST['nome'])) {
            $nome = addslashes($_POST['nome']);
            $cpf = addslashes($_POST['cpf']);
            $telefone = addslashes($_POST['telefone']);
            $data_nascimento = addslashes($_POST['data_nascimento']);
            $sexo = addslashes($_POST['sexo']);

            if ($c->verificarCadastrado($cpf)) {
                $c->cadastrar($nome, $cpf, $telefone, $data_nascimento, $sexo);
                header("Location: " . BASE_URL . "clientes");
                exit;
            } else {
                header("Location: " . BASE_URL . "clientes/adicionar?aviso=error");
            }
        }

        $this->loadTemplate("adicionar-cliente", $dados);    //carrega a view do home
    }

    public function editar() {
        if (empty($_SESSION['cLogin'])) {
            header("Location: " . BASE_URL . "login");
        }

        $dados = array();

        $c = new Clientes();
        $dados['cliente_dados'] = $c->getClientePorId($_GET['id']);
        if (!empty($_POST['nome'])) {
            $nome = addslashes($_POST['nome']);
            $cpf = addslashes($_POST['cpf']);
            $telefone = addslashes($_POST['telefone']);
            $data_nascimento = addslashes($_POST['data_nascimento']);
            $sexo = addslashes($_POST['sexo']);
            $id = addslashes($_POST['id']);

            $c->editar($nome, $cpf, $telefone, $data_nascimento, $sexo, $id);
            header("Location: " . BASE_URL . "clientes?aviso=sucesso");
            exit;
        }

        $this->loadTemplate("editar-cliente", $dados);    //carrega a view do home
    }

    public function excluir() {

        if (isset($_GET['id'])) {
            $c = new Clientes();
            $c->excluir($_GET['id']);
            header("Location: " . BASE_URL . "clientes");
        }
    }

}
