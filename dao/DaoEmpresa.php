<?php
/**
 * Description of DaoEmpresa
 *
 * @author Erica
 */
class DaoEmpresa implements IDao {
    
    
    public function excluir($e) {
        $sql = "delete FROM empresa where id=:ID";
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);
        $p1 = $e->getId();
        $sth->bindParam("ID", $p1);
        try {
            $sth->execute();
            return true;
        } catch (Exception $exc) {
            return $exc->getMessage();
        }
    }

    public function listar($p1) {
        $sql = "SELECT * FROM empresa where id=:ID";
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);
        $sth->bindParam("ID", $p1);
        try {
            $sth->execute();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
        $emp = $sth->fetchObject("Empresa");
        return $emp;
    }

    public function listarTodos() {
        $sql = "SELECT * FROM empresa";
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);
        try {
            $sth->execute();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
        $arEmp = array();
        while ($emp = $sth->fetchObject("Empresa")) {

            $arEmp[] = $emp;
        }
        return $arEmp;
    }

    public function salvar($e) {
        $nome = $e->getNome();
        $situacao = $e->getSituacao();
        $id = 0;

        if ($e->getId()) {
            $id = $e->getId();
            $sql = "update empresa set nome=:nome, situacao=:situacao where id=:id";
        } else {
            $sql = "insert into empresa(id,nome,situacao) values "
                    . "(:id,:nome,:situacao)";
        }
        $cnx = Conexao::getConexao();
        $sth = $cnx->prepare($sql);
        $sth->bindParam("id", $id);
        $sth->bindParam("nome", $nome);
        $sth->bindParam("situacao", $situacao);
        
        try {
            $sth->execute();
            return $e;
        } catch (Exception $exc) {
            return $exc->getMessage();
    }

    }
}