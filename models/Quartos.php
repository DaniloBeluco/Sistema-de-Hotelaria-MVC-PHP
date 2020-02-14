<?php

class Quartos extends model {

    public function getQuartos($offset, $total) {
        
        $sql = "SELECT * FROM quartos LIMIT $offset, $total";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $dados = $sql->fetchAll();
            return $dados;
        } else {
            return false;
        }
    }

    public function cadastrar($nome, $capacidade, $url_imagem, $descricao) {
        $sql = "INSERT INTO quartos (nome, capacidade, url_imagem, descricao) VALUES (:nome, :capacidade, :url_imagem, :descricao)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":capacidade", $capacidade);
        $sql->bindValue(":url_imagem", $url_imagem);
        $sql->bindValue(":descricao", $descricao);
        $sql->execute();
    }

    public function verificarCadastrado($nome) {

        $sql = "SELECT
		*
		FROM quartos
		WHERE
		nome = :nome ";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":nome", $nome);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function getTotal() {
        $sql = "SELECT count(*) as c FROM quartos";
        $sql = $this->db->query($sql);
        $qt = $sql->fetch();

        return $qt['c'];
    }

}
