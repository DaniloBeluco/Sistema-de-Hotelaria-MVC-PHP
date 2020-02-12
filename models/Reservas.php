<?php

class Reservas extends model {

    public function get() {

        $sql = "SELECT * FROM reservas";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $dado = $sql->fetch();
            $_SESSION['cLogin'] = $dado['id'];
            return $dado['id'];
        } else {
            return false;
        }
    }

    public function getReservas($offset, $total, $filtros) {

        $string_filtro = '';
        if (($filtros['cliente'] != '') && ($filtros['quarto'] != '')) {
            $string_filtro = "WHERE c.nome = '" . $filtros['cliente'] . "' AND q.nome = '" . $filtros['quarto'] . "'";
        } else if ($filtros['cliente'] != '') {
            $string_filtro = "WHERE c.nome = '" . $filtros['cliente'] . "'";
        } else if ($filtros['quarto'] != '') {
            $string_filtro = "WHERE q.nome = '" . $filtros['quarto'] . "'";
        }

        $sql = "SELECT c.nome AS cliente, q.nome AS quarto, r.* FROM reservas r INNER JOIN quartos q ON r.id_quarto = q.id INNER JOIN clientes c ON r.id_cliente = c.id $string_filtro ORDER BY data_inicio DESC LIMIT $offset, $total";

        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $dados = $sql->fetchAll();
            return $dados;
        } else {
            return false;
        }
    }

    public function verificarDisponibilidade($quarto, $data_inicio, $data_fim) {

        $sql = "SELECT
		*
		FROM reservas
		WHERE
		id_quarto = :quarto AND
		( NOT ( data_inicio > :data_fim OR data_fim < :data_inicio ) )";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":quarto", $quarto);
        $sql->bindValue(":data_inicio", $data_inicio);
        $sql->bindValue(":data_fim", $data_fim);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function verificarQuartosReservadosNaData($data) {
        $array = array();
        $sql = "SELECT * FROM quartos q INNER JOIN reservas r ON q.id = r.id_quarto WHERE data_inicio <= '$data' and data_fim > '$data' ORDER BY data_inicio DESC";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":data", $data);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return $sql->fetchAll();
        } else {
            return $array;
        }
    }

    public function verificarQuartosLivresNaData($quarto, $data) {
        $array = array();
        $reservados = array();
        $quartos_livres = array();

        /* Seleciona os quartos que estão reservados */
        $sql = "SELECT * FROM quartos q INNER JOIN reservas r ON q.id = r.id_quarto WHERE data_inicio <= '$data' and data_fim > '$data' ORDER BY data_inicio DESC";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":data", $data);
        $sql->execute();
        $reservados = $sql->fetchAll();

        foreach ($reservados as $res) {
            if ($res['nome'] == $quarto) {
                return false;
            }
        }
        return true;
    }

    public function reservar($quarto, $data_inicio, $data_fim, $id_cliente) {
        $sql = "INSERT INTO reservas (id_quarto, data_inicio, data_fim, id_cliente) VALUES (:quarto, :data_inicio, :data_fim, :id_cliente)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":quarto", $quarto);
        $sql->bindValue(":data_inicio", $data_inicio);
        $sql->bindValue(":data_fim", $data_fim);
        $sql->bindValue(":id_cliente", $id_cliente);
        $sql->execute();
    }

    public function getTotal() {
        $sql = "SELECT count(*) as c FROM reservas";
        $sql = $this->db->query($sql);
        $qt = $sql->fetch();

        return $qt['c'];
    }

    public function getQuartos() {
        $array = array();
        $sql = "SELECT * FROM quartos";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            return $sql->fetchAll();
        } else {
            return $array;
        }
    }

}

?>