<h4>Deseja excluir a categoria?<?php
    $cat = $this->getDados("categoria");
    if ($cat instanceof Categoria) {
        echo $cat->getDescricao();
    }
    ?>?</h4>
<form method="post" action="<?php echo URL; ?>controle-categoria/confirma-exclusao">
    <input type="hidden" name="id" value="<?php
    if ($cat instanceof Categoria) {
        echo $cat->getId();
    }
    ?>">
    <input type="submit" value="Sim">
</form>
<a href="<?php echo URL; ?>controle-categoria/lista-de-categoria" >Não</a>