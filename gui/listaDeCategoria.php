

        <div class="container">

            <a class="btn btn-danger" href="<?php echo URL; ?>Login/logout/">
                <i class="glyphicon glyphicon-remove"></i> Logout</a>
            <a class="btn btn-primary" href="<?php echo URL; ?>controle-categoria/novo/">Nova Categoria</a>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Descrição</th>
                    </tr>
                <tbody>

                    <?php if ($this->getDados('categoria')): ?>
                        <?php $ar = $this->getDados('categoria'); ?>

                     <?php foreach ($ar as $categoria): ?>
                           <?php $categoria instanceof Categoria; ?>
                                 
                            <tr><td><?= $categoria->getId() ?></td>
                            <td><?= $categoria->getDescricao() ?></td>
                            <td><img class="thumbnail thumb" src="<?= URL.$categoria->getThumbnail_path() ?>"/></td>
                            <td>
                            <a class="btn btn-default" 
                               href="<?= URL ?>controle-categoria/excluir/<?= $categoria->getId() ?>">
                                    excluir
                            </a> &nbsp;
                            <a class="btn btn-default" href="<?= URL ?>controle-categoria/editar/<?= $categoria->getId() ?>">
                                    editar
                            </a>
                            </td></tr>
                    <?php endforeach; ?>
                    <?php endif; ?>

                </tbody>
                </thead>    
            </table>

        </div>