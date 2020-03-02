<?php require_once ABSPATH . 'Views/includes/cabecalho.inc.php'; ?>

<div class="page-header">
  <h4>Cadastro de Endereços</h4>
</div>

<a href="<?php echo HOME_URL . 'enderecos/form?cliente_id='.$_GET["cliente_id"].'' ?>" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Novo</a>
<hr>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Logradouro</th>
            <th>Bairro</th>
            <th>CEP</th>
            <th>Número</th>            
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php if ( $enderecos ) : ?>
            <?php while ( $endereco = $enderecos->fetch_object() ) : ?>
                <tr>
                    <td><?php echo $endereco->id ?></td>
                    <td><?php echo $endereco->logradouro ?></td>                    
                    <td><?php echo $endereco->bairro ?></td>
                    <td><?php echo $endereco->cep ?></td>
                    <td><?php echo $endereco->numero ?></td>
                    <td class="text-right">
                        <a href="<?php echo HOME_URL . "enderecos/form?id={$endereco->id}" ?>" class="btn btn-primary"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                        <a href="<?php echo HOME_URL . "enderecos/excluir?id={$endereco->id}" ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else : ?>
            <tr>
                <td colspan="5">Nenhum registro encontrado!</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php require_once ABSPATH . 'Views/includes/rodape.inc.php'; ?>