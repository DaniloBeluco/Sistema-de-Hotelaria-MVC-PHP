<?php

class calendarioController extends controller {

    public function index() {
        $dados = array();

        if (empty($_GET['ano'])) {
            exit;
        }

        /* Recebe o ano e mês atuais através do GET */
        $data = $_GET['ano'] . '-' . $_GET['mes'];
        //echo ' -- $data: ' . $data;

        /* Primeiro dia da semana de um mês específico */
        $dia1 = date('w', strtotime($data));
        //echo ' -- $dia1: ' . $dia1;

        /* Quantos dias tem aquele mês */
        $dias = date('t', strtotime($data));
        //echo ' -- $dias: ' . $dias;

        /* Quantidade de linhas p/ tabela do mês */
        $linhas = ceil(($dia1 + $dias) / 7);

        /* Quantos dias do último mês têm no calendário atual */
        $dia1 = -$dia1;

        /* Data início do calendário com os dias do último mês na tabela atual */
        $data_inicio = date('Y-m-d', strtotime($dia1 . ' days', strtotime($data)));

        /* Data fim do calendário com os dias do próximo mês na tabela atual */
        $data_fim = date('Y-m-d', strtotime(( ($dia1 + ($linhas * 7) - 1) ) . ' days', strtotime($data)));
        //echo ' -- $data_fim: ' . $data_fim;

        $dados['linhas'] = $linhas;
        $dados['data_inicio'] = $data_inicio;
        $dados['data_fim'] = $data_fim;

        $this->loadTemplate('calendario', $dados);
    }

}
