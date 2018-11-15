    <?php
/**
 * Description of ControleProduto
 *
 * @author Erica
 */
class ControleProduto implements IPrivateTO { //iprivate to é umainterface vazia
     public function listaDeProduto() {
        $dp = new DaoProduto(); // a variavel "dp" é DaoProduto
        $produtos = $dp->listarTodos();
        $v = new TGui("listaDeProduto"); ///cria a visão
        $v->addDados("produtos", $produtos); //insere dados nela
        $v->renderizar();
    }
    public function editar($id) {
        $p1 = $id[2];
        $dp = new DaoProduto();
        $p = $dp->listar($p1);
        $v = new TGui("formularioProduto");
        $v->addDados("produto", $p);
        $v->addDados("categorias", $this->getCategoria());
        $v->renderizar();
    }
    private function getCategoria(){
        $dc = new DaoCategoria();
        return $dc->listarTodos();
        
    }
    public function novo() {
        $p = new Produto();
        $v = new TGui("formularioProduto");
        $v->addDados("produto", $p);
        $v->addDados("categorias", $this->getCategoria());
        $v->renderizar();
    }
    public function salvar() {
       
        $prod = new Produto();
        $id = isset($_POST['id']) ? $_POST['id'] : FALSE;
        if (trim($id) != "") { //se id diferente de vazio
            $prod->setId($id);
        }
        $nome = isset($_POST['nome']) ? $_POST['nome'] : FALSE;
        if (!$nome || trim($nome) == "") {
            throw new Exception("O campo nome é obrigatório!");
        }
        
         $situacao = isset($_POST['status']) ? $_POST['status'] : FALSE;
        if (!$situacao || trim($situacao) == "") {
            throw new Exception("O campo situação é obrigatório!");
        }
        
         $valor = isset($_POST['valor']) ? $_POST['valor'] : FALSE;
        if (!$valor || trim($valor) == "") {
            throw new Exception("O campo valor é obrigatório!");
        }
         $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : FALSE;
        if (!$categoria || trim($categoria) == "") {
            throw new Exception("O campo categoria é obrigatório!");
        }   
        
        $prod->setNome($nome);
        $prod->setSituacao($situacao);
        $prod->setValor($valor);
        $prod->setCategoria($categoria);
        
        $dp = new DaoProduto();
        $dp->salvar($prod);
        header("location: " . URL . "controle-produto/lista-de-produto"); 
        
    }
    
    public function excluir ($id) {
        $p1 = $id[2];
        $dp = new DaoProduto();
        $p = $dp->listar($p1);
        $v = new TGui("confirmaExclusaoProduto");
        $v->addDados("produto", $p);
        $v->renderizar();
    }
    public function confirmaExclusao() {
        $id = isset($_POST['id']) ? $_POST['id'] : false;
        if ($id) {
            $dp = new DaoProduto();
            $prod = $dp->listar($id);
            if ($dp->excluir($prod)) {
                header("location: " . URL . "controle-produto/lista-de-produto");
            } else {
                throw new Exception("Não foi possível excluir o registro!");
            }
        } else {
            header("location: " . URL . "controle-produto/lista-de-produto");
        }
    }
}