<?php

class reservasController extends controller {

    public function index() {
        if (empty($_SESSION['cLogin'])) {
            header("Location: " . BASE_URL . "login");
        }
        $dados = array();
        $r = new Reservas();


        //filtragem
        $filtros = array('cliente' => '', 'quarto' => '');
        if (isset($_GET['filtro_cliente'])) {
            $filtros['cliente'] = $_GET['filtro_cliente'];
        }
        if (isset($_GET['filtro_quarto'])) {
            $filtros['quarto'] = $_GET['filtro_quarto'];
        }


        //paginação
        if (!isset($_GET['p']) || empty($_GET['p'])) {
            $atual = 1;
        } else {
            $atual = $_GET['p'];
        }
        $total = $r->getTotal();
        $items_por_pagina = 6;
        $paginas = ceil($total / $items_por_pagina);

        $offset = ($items_por_pagina * $atual) - $items_por_pagina;
        $res = $r->getReservas($offset, $items_por_pagina, $filtros);

        $dados['reservas'] = $res;
        $dados['paginas'] = $paginas;


        $this->loadTemplate("reservas", $dados);    //carrega a view do home
    }

    public function adicionar() {
        if (empty($_SESSION['cLogin'])) {
            header("Location: " . BASE_URL . "login");
        }
        $dados = array();

        $reservas = new Reservas();
        $quartos = new Quartos();
        $c = new Clientes();

        if (!empty($_POST['quarto'])) {
            $quarto = addslashes($_POST['quarto']);
            $data_inicio = explode('/', addslashes($_POST['data_inicio']));
            $data_fim = explode('/', addslashes($_POST['data_fim']));
            $cliente = addslashes($_POST['cliente']);

            $data_inicio = $data_inicio[2] . '-' . $data_inicio[1] . '-' . $data_inicio[0];
            $data_fim = $data_fim[2] . '-' . $data_fim[1] . '-' . $data_fim[0];

            if ($reservas->verificarDisponibilidade($quarto, $data_inicio, $data_fim)) {
                $reservas->reservar($quarto, $data_inicio, $data_fim, $cliente);
                header("Location: " . BASE_URL . "reservas");
                exit;
            } else {
                header("Location: " . BASE_URL . "reservas/adicionar?aviso=error");
            }
        }

        $dados['quartos'] = $quartos->getQuartos('0', $quartos->getTotal());
        $dados['clientes'] = $c->getClientes(0, $c->getTotal(), '');


        $this->loadTemplate("adicionar-reserva", $dados);    //carrega a view do home
    }

}
