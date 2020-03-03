<?php require_once ABSPATH . 'Views/includes/cabecalho.inc.php'; ?>

<div class="page-header">
  <h4>Cadastro de Endereços</h4>
</div>

<form action="<?php echo HOME_URL . 'enderecos/salvar' ?>" class="form-horizontal" method="post">
    <input type="hidden" name="id" id="endereco-id" value="<?php echo $endereco->id ?>">
    <input type="hidden" name="cliente_id" id="endereco-cliente_id" value="<?php echo $_GET["cliente_id"] ?>">
    <div class="form-group">
        <label for="endereco-logradouro" class="col-sm-2 control-label">Logradouro:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="logradouro" id="endereco-logradouro" 
                maxlength="255" value="<?php echo $endereco->logradouro ?>" required>
        </div>
    </div>       
    <div class="form-group">
        <label for="endereco-bairro" class="col-sm-2 control-label">Bairro:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="bairro" id="endereco-bairro" 
                maxlength="100" value="<?php echo $endereco->bairro ?>" required>
        </div>
    </div>    
    <div class="form-group">
        <label for="endereco-cep" class="col-sm-2 control-label">CEP:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="cep" id="endereco-cep" 
                maxlength="8" value="<?php echo $endereco->cep ?>" required>
        </div>
    </div>    
    <div class="form-group">
        <label for="endereco-numero" class="col-sm-2 control-label">Número:</label>
        <div class="col-sm-4">
            <input type="number" class="form-control" name="numero" id="endereco-numero" 
                value="<?php echo $endereco->numero ?>" required>
        </div>
    </div>    
    <div class="form-actions">
        <button class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Salvar</button>        
    </div>
</form>
<form id="endereco" action="<?php echo HOME_URL . 'enderecos/salvar' ?>" class="form-horizontal" method="post">
    <input type="hidden" name="endereco_id" value="<?php echo $endereco->id ?>" >

</form>
<?php require_once ABSPATH . 'Views/includes/rodape.inc.php'; ?>