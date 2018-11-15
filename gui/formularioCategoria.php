<div class="container">
    <?php
    $id = "";
    $descricao = "";
    $status = "";
    
    $categoria = $this->getDados("categoria");
    if ($categoria) {
        $categoria instanceof Categoria;
        $id = $categoria->getId();
        $descricao = $categoria->getDescricao();
        //$status = $categoria->getSituacao();
        
    }
    ?>

    <form method="post" enctype="multipart/form-data" action="<?php echo URL; ?>controle-categoria/salvar"> 
        <label>Id</label><br>
        <input class="form-control" type="text" readonly="true" value="<?php echo $id; ?>" name="id"><br>
        <label>Descrição</label><br>
        <input class="form-control" type="text" value="<?php echo $descricao; ?>" name="descricao"><br>
        
        <label>status</label><br>
        <select class="form-control" name="status">
            <option value="A" <//?php
            if ($status == 'A') {
                echo 'selected="true"';
            }
            ?>Ativo</option>
            <option value="I" <//?php
            if ($status == 'I') {
                echo 'selected="true"';
            }
            ?>>Inativo</option>
        </select>
        
        <hr/>
        
        <hr/>
        <input type="submit" class="btn btn-success" value="Salvar"><br>
        <a class="btn btn-default" href="<?php echo URL; ?>controle-categoria/lista-de-categoria">voltar</a><br>
    </form>
</div>
<script type="text/javascript" src="<?= URL ?>/js/jquery.3.1.1.min.js"></script>
<script type="text/javascript" src="<?= URL ?>/js/bootstrap.min.js"></script>
<script type="text/javascript"> </script>