<?php require_once ABSPATH . 'Views/includes/cabecalho.inc.php'; ?>

<div class="page-header">
  <h4>Cadastro de Clientes</h4>
</div>
<script type="text/javascript">
    $(function () {
        $('#cliente-data_nascimento').datepicker({
            dateFormat: 'dd/mm/yy'
        });
    });
</script>

<form action="<?php echo HOME_URL . 'clientes/salvar' ?>" class="form-horizontal" method="post">
    <input type="hidden" name="id" id="cliente-id" value="<?php echo $cliente->id ?>">
    <div class="form-group">
        <label for="cliente-nome" class="col-sm-2 control-label">Nome:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="nome" id="cliente-nome" maxlength="50" value="<?php echo $cliente->nome ?>" required>
        </div>
    </div>
    <div class="form-group">
        <label for="cliente-cpf" class="col-sm-2 control-label">Data Nascimento:</label>
        <div class="col-sm-4" id="datepicker">
            <input type="text" class="form-control" name="data_nascimento" id="cliente-data_nascimento" value="<?php if(isset($cliente->data_nascimento)) { echo date("d/m/Y", strtotime($cliente->data_nascimento)); } ?>" required>            
        </div>
    </div>      
    <div class="form-group">
        <label for="cliente-cpf" class="col-sm-2 control-label">CPF:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="cpf" id="cliente-cpf" maxlength="11" value="<?php echo $cliente->cpf ?>" required>
        </div>
    </div>    
    <div class="form-group">
        <label for="cliente-rg" class="col-sm-2 control-label">RG:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="rg" id="cliente-rg" maxlength="12" value="<?php echo $cliente->rg ?>" required>
        </div>
    </div>    
    <div class="form-group">
        <label for="cliente-telefone" class="col-sm-2 control-label">Telefone:</label>
        <div class="col-sm-4">
            <input type="tel" class="form-control" name="telefone" id="cliente-telefone" maxlength="20" value="<?php echo $cliente->telefone ?>" required>
        </div>
    </div>    
    <div class="form-actions">
        <button class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Salvar</button>
        <a href="<?php echo HOME_URL . 'clientes' ?>" class="btn btn-default"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span> Voltar</a>
    </div>
</form>
<form id="endereco" action="<?php echo HOME_URL . 'clientes/salvar' ?>" class="form-horizontal" method="post">
    <input type="hidden" name="cliente_id" value="<?php echo $cliente->id ?>" >

</form>
<?php require_once ABSPATH . 'Views/includes/rodape.inc.php'; ?>