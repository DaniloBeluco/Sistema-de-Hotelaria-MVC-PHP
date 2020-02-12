<?php

class dashboardController extends controller {

    public function index() {
        $dados = array();
        $c = new Clientes();
        $r = new Reservas();

        $quartos_disponiveis = array();

        foreach ($r->getQuartos() as $quarto) {
            if ($r->verificarQuartosLivresNaData($quarto['nome'], date('Y-m-d'))) {
                array_push($quartos_disponiveis, $quarto);
            } else {
                
            }
        }

        $dados['total_disponiveis'] = count($quartos_disponiveis);
        $dados['total_clientes'] = $c->getTotal();
        $dados['total_reservas'] = $r->getTotal();

        $this->loadTemplate('dashboard', $dados);
    }

}
