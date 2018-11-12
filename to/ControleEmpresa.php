<?php

/**
 * Description of ControleEmpresa
 *
 * @author Erica
 */
class ControleEmpresa implements IPrivateTO { //iprivate to é umainterface vazia

    public function listaDeEmpresa() {
        $de = new DaoEmpresa();
        $empresas = $de->listarTodos();
        $v = new TGui("listaDeEmpresa"); ///cria a visão
        $v->addDados("empresas", $empresas); //insere dados nela
        $v->renderizar();
    }

    public function editar($id) {
        $p1 = $id[2];
        $de = new DaoEmpresa();
        $e = $de->listar($p1);
        $v = new TGui("formularioEmpresa");
        $v->addDados("empresa", $e);
        $v->renderizar();
    }

    public function novo() {
        $e = new Empresa();
        $v = new TGui("formularioEmpresa");
        $v->addDados("empresa", $e);
        $v->renderizar();
    }

    public function salvar() {
       
        $emp = new Empresa();
        $id = isset($_POST['id']) ? $_POST['id'] : FALSE;
        if (trim($id) != "") { //se id diferente de vazio
            $emp->setId($id);
        }
        $nome = isset($_POST['nome']) ? $_POST['nome'] : FALSE;
        if (!$nome || trim($nome) == "") {
            throw new Exception("O campo nome é obrigatório!");
        }
        $situacao = isset($_POST['status']) ? $_POST['status'] : FALSE;
        if (!$situacao || trim($situacao) == "") {
            throw new Exception("O campo situação é obrigatório!");
        }
        $emp->setNome($nome);
        $emp->setSituacao($situacao);

        $de = new DaoEmpresa();
        $de->salvar($emp);

        header("location: " . URL . "controle-empresa/lista-de-empresa");
       
    }

    public function excluir($id) {
        $p1 = $id[2];
        $de = new DaoEmpresa();
        $e = $de->listar($p1);
        $v = new TGui("confirmaExclusaoEmpresa");
        $v->addDados("empresa", $e);
        $v->renderizar();
    }

    public function confirmaExclusao() {
        $id = isset($_POST['id']) ? $_POST['id'] : false;
        if ($id) {
            $de = new DaoEmpresa();
            $emp = $de->listar($id);
            if ($de->excluir($emp)) {
                header("location: " . URL . "controle-empresa/lista-de-empresa");
            } else {
                throw new Exception("Não foi possível excluir o registro!");
            }
        } else {
            header("location: " . URL . "controle-empresa/lista-de-empresa");
        }
    }

}
