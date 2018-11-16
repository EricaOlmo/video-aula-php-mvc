<div class="container">

            <a class="btn btn-danger" href="<?php echo URL; ?>Login/logout/">
                <i class="glyphicon glyphicon-remove"></i> Logout</a>
            <a class="btn btn-primary" href="<?php echo URL; ?>controle-produto/novo/">Novo Produto</a>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOME</th>
                        <th>situaçao</th>
                        <th>Valor</th>
                        <th>Categoria</th>
                        <th>controles</th>
                    </tr>
                <tbody>
                       
                    <?php if ($this->getDados('produtos')): ?>  
                        <?php $ar = $this->getDados('produtos'); ?>
                    
                     <?php foreach ($ar as $produto): ?>
                           <?php $produto instanceof Produto; ?>
                                 
                            <tr><td><?= $produto->getId() ?></td>
                            <td><?= $produto->getNome() ?></td>
                            <td><?= $produto->getSituacao()?>
                            <td><?= $produto->getvalor()?></td>
                            <td><?=$produto->getCategoria()->getDescricao()?></td-->
                            <!--quando eu deixo a linha acima sem comentar aparece mensagem de erro no local
                            da categoria e não aparece os controles, desisti de tentar arrumar, foi o maximo que
                            consegui sem pedir ajuda a ninguem-->
                          
                            <td>
                            <a class="btn btn-default" 
                               href="<?= URL ?>controle-produto/excluir/<?= $produto->getId() ?>">
                                    excluir
                            </a> &nbsp;
                            <a class="btn btn-default" href="<?= URL ?>controle-produto/editar/<?= $produto->getId() ?>">
                                    editar
                            </a>
                            </td></tr>
                    <?php endforeach; ?>
                    <?php endif; ?>

                </tbody>
                </thead>    
            </table>

        </div>