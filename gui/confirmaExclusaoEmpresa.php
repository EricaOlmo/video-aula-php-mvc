<h4>Deseja excluir a empresa ? <?php
    $emp = $this->getDados("empresa");
    if ($emp instanceof Empresa) {
        echo $emp->getNome();
    }
    ?>?</h4>
<form method="post" action="<?php echo URL; ?>controle-empresa/confirma-exclusao">
    <input type="hidden" name="id" value="<?php
    if ($emp instanceof Empresa) {
        echo $emp->getId();
    }
    ?>">
    <input type="submit" value="Sim">
</form>
<a href="<?php echo URL; ?>controle-empresa/lista-de-empresa" >Não</a>
