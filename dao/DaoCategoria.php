<?php
/**
 * Description of DaoCategoria
 *
 * @author Erica
 */
class DaoCategoria implements IDao {
    
    
   public function excluir($ct) {
        $sql = "delete FROM categoria where id=:ID";
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);
        $p1 = $ct->getId();
        $sth->bindParam("ID", $p1);
        try {
            $sth->execute();
            return true;
        } catch (Exception $exc) {
            return $exc->getMessage();
        }
    }
    public function listar($p1) {
        $sql = "SELECT * FROM categoria where id=:ID";
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);
        $sth->bindParam("ID", $p1);
        try {
            $sth->execute();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
        $cat = $sth->fetchObject("Categoria");
        return $cat;
    }
    public function listarTodos() {
        $sql = "SELECT * FROM categoria";
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);
        try {
            $sth->execute();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
        $arCat = array();
        while ($cat = $sth->fetchObject("Categoria")) {
            $arCat[] = $cat;
        }
        return $arCat;
    }
    public function salvar($cat) {
        $descricao = $cat->getDescricao();
        //$situacao = $situacao->getSituacao();
        $id = 0;
        if ($cat->getId()) {
            $id = $cat->getId();
            $sql = "update categoria set descricao=:descricao where id=:id";
        } else {
            $sql = "insert into categoria(id, descricao) values "
                    . "(:id, :descricao)";
        }
        $cnx = Conexao::getConexao();
        $sth = $cnx->prepare($sql);
        $sth->bindParam(":id", $id);
        $sth->bindParam(":descricao", $descricao);
        //$sth->bindParam("situacao", $situacao);
        
        try {
            $sth->execute();
            return $cat;
        } catch (Exception $exc) {
            return $exc->getMessage();
    }
    
    }
}