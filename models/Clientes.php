<?php

class Clientes extends model {

    public function get() {

        $sql = "SELECT * FROM clientes";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $dado = $sql->fetch();
            $_SESSION['cLogin'] = $dado['id'];
            return $dado['id'];
        } else {
            return false;
        }
    }

    public function getClientes($offset, $total, $filtros) {

        $string_filtro = '';
        if ($filtros != '') {
            if (($filtros['nome'] != '') && ($filtros['cpf'] != '')) {
                $string_filtro = "WHERE nome = '" . $filtros['nome'] . "' AND cpf = '" . $filtros['cpf'] . "'";
            } else if ($filtros['nome'] != '') {
                $string_filtro = "WHERE nome = '" . $filtros['nome'] . "'";
            } else if ($filtros['cpf'] != '') {
                $string_filtro = "WHERE cpf = '" . $filtros['cpf'] . "'";
            }
        }
        $sql = "SELECT * FROM clientes $string_filtro LIMIT $offset, $total";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $dados = $sql->fetchAll();
            return $dados;
        } else {
            return false;
        }
    }

    public function getClientePorId($id) {


        $sql = "SELECT * FROM clientes WHERE id = $id";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $dados = $sql->fetch();
            return $dados;
        } else {
            return false;
        }
    }

    public function verificarCadastrado($cpf) {

        $sql = "SELECT
		*
		FROM clientes
		WHERE
		cpf = :cpf ";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":cpf", $cpf);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function cadastrar($nome, $cpf, $telefone, $data_nascimento, $sexo) {
        $sql = "INSERT INTO clientes (nome, cpf, telefone, data_nascimento, sexo) VALUES (:nome, :cpf, :telefone, :data_nascimento, :sexo)";
        $sql = $this->db->prepare($sql);

        $sql->bindValue(":nome", utf8_encode($nome));
        $sql->bindValue(":cpf", $cpf);
        $sql->bindValue(":telefone", $telefone);
        $data_nascimento_array = explode('/', $data_nascimento);
        $sql->bindValue(":data_nascimento", $data_nascimento_array[2] . '-' . $data_nascimento_array[1] . '-' . $data_nascimento_array[0]);
        $sql->bindValue(":sexo", $sexo);
        $sql->execute();
    }

    public function editar($nome, $cpf, $telefone, $data_nascimento, $sexo, $id) {
        $sql = "UPDATE clientes SET nome = :nome, cpf = :cpf, telefone = :telefone, data_nascimento = :data_nascimento, sexo = :sexo WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":nome", utf8_encode($nome));
        $sql->bindValue(":cpf", $cpf);
        $sql->bindValue(":telefone", $telefone);

        $data_nascimento_array = explode('/', $data_nascimento);
        $sql->bindValue(":data_nascimento", $data_nascimento_array[2] . '-' . $data_nascimento_array[1] . '-' . $data_nascimento_array[0]);
        $sql->bindValue(":sexo", $sexo);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

    public function excluir($id) {
        $sql = "DELETE FROM clientes WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

    public function getTotal() {
        $sql = "SELECT count(*) as c FROM clientes";
        $sql = $this->db->query($sql);
        $qt = $sql->fetch();

        return $qt['c'];
    }

}
