<div class="container">
    <?php
    $id = "";
    $nome = "";
    $status = "";
    $valor = "";
    //$categoria = "";

    $produto = $this->getDados("produto");
    if ($produto) {
        $produto instanceof Empresa;
        $id = $produto->getId();
        $nome = $produto->getNome();
        $status = $produto->getSituacao();
        $valor = $produto->getValor();
        //$categoria = $produto->getCategoria();
    }
    ?>

    <form method="post" enctype="multipart/form-data" action="<?php echo URL; ?>controle-produto/salvar"> 
        <label>Id</label><br>
        <input class="form-control" type="text" readonly="true" value="<?php echo $id; ?>" name="id"><br>
        <label>Nome</label><br>
        <input class="form-control" type="text" value="<?php echo $nome; ?>" name="nome"><br>
        
        <label>status</label><br>
        <select class="form-control" name="status">
            <option value="A" <?php
            if ($status == 'A') {
                echo 'selected="true"';
            }
            ?>>Ativo</option>
            <option value="I" <?php
            if ($status == 'I') {
                echo 'selected="true"';
            }
            ?>>Inativo</option>
        </select>
        <label>Valor</label><br>
        <input class="form-control" type="float" value="<?php echo $valor; ?>" name="valor"><br>
       <!--COLOCAR A CATEGORIA-->
        
        <hr/>
        
        <hr/>
        <input type="submit" class="btn btn-success" value="Salvar"><br>
        <a class="btn btn-default" href="<?php echo URL; ?>controle-produto/lista-de-produto">voltar</a><br>
    </form>
</div>
<script type="text/javascript" src="<?= URL ?>/js/jquery.3.1.1.min.js"></script>
<script type="text/javascript" src="<?= URL ?>/js/bootstrap.min.js"></script>
<script type="text/javascript"> </script>