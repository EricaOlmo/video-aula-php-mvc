<?php

/**
 * Description of ControleCategoria
 *
 * @author Erica
 */
class ControleCategoria implements IPrivateTO { //iprivate to é umainterface vazia

    public function listaDeCategoria() {
        $dc = new DaoCategoria();
        $categorias = $dc->listarTodos();
        $v = new TGui("listaDeCategoria"); ///cria a visão
        $v->addDados("categorias", $categorias); //insere dados nela
        $v->renderizar();
    }

    public function editar($id) {
        $p1 = $id[2];
        $dc = new DaoCategoria();
        $ct = $dc->listar($p1);
        $v = new TGui("formularioCategoria");
        $v->addDados("categoria", $ct);
        $v->renderizar();
    }

    public function novo() {
        $ct = new Categoria();
        $v = new TGui("formularioCategoria");
        $v->addDados("categoria", $ct);
        $v->renderizar();
    }

    public function salvar() {
       
        $cat = new Categoria();
        $id = isset($_POST['id']) ? $_POST['id'] : FALSE;
        if (trim($id) != "") { //se id diferente de vazio
            $cat->setId($id);
        }
        $descricao = isset($_POST['descricao']) ? $_POST['descricao'] : FALSE;
        if (!$descricao || trim($descricao) == "") {
            throw new Exception("O campo descriçao é obrigatório!");
        }
        
         $situacao = isset($_POST['status']) ? $_POST['status'] : FALSE;
        if (!$situacao || trim($situacao) == "") {
            throw new Exception("O campo situação é obrigatório!");
        }
        
        $cat->setDescricao($descricao);
        //$cat->setSituacao($situacao);
        
        $dc = new DaoCategoria();
        $dc->salvar($cat);

        header("location: " . URL . "controle-categoria/lista-de-categoria");
       
    }

    public function excluir($id) {
        $p1 = $id[2];
        $dc = new DaoCategoria();
        $ct = $dc->listar($p1);
        $v = new TGui("confirmaExclusaoCategoria");
        $v->addDados("categoria", $ct);
        $v->renderizar();
    }

    public function confirmaExclusao() {
        $id = isset($_POST['id']) ? $_POST['id'] : false;
        if ($id) {
            $dc = new DaoCategoria();
            $cat = $dc->listar($id);
            if ($dc->excluir($cat)) {
                header("location: " . URL . "controle-categoria/lista-de-categoria");
            } else {
                throw new Exception("Não foi possível excluir o registro!");
            }
        } else {
            header("location: " . URL . "controle-categoria/lista-de-categoria");
        }
    }

}
