<h4>Deseja excluir o produto? <?php
    $prod = $this->getDados("produto");
    if ($prod instanceof Produto) {
        echo $prod->getNome();
    }
    ?>?</h4>
<form method="post" action="<?php echo URL; ?>controle-produto/confirma-exclusao">
    <input type="hidden" name="id" value="<?php
    if ($prod instanceof Produto) {
        echo $prod->getId();
    }
    ?>">
    <input type="submit" value="Sim">
</form>
<a href="<?php echo URL; ?>controle-produto/lista-de-produto" >Não</a>