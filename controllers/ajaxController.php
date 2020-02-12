<?php

class ajaxController extends controller {

    public function index() {

        $dados = array();
        $data = '2020-03-01';
        $quartos_disponiveis = array();

        if (isset($_POST['data'])) {
            $data = $_POST['data'];
            $d = explode('/', $data);
            $data = $d[2] . '-' . $d[1] . '-' . $d[0];
            $r = new Reservas();

            foreach ($r->getQuartos() as $quarto) {
                if ($r->verificarQuartosLivresNaData($quarto['nome'], $data)) {
                    array_push($quartos_disponiveis, $quarto);
                } else {
                    
                }
            }

            $dados['quartos_disp'] = $quartos_disponiveis;
            $dados['quartos'] = $r->verificarQuartosReservadosNaData($data);
        }



        $this->loadView('ajax', $dados);
    }

}
