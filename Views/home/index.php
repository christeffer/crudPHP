<?php 
    if(!isset($_SESSION['usuarioSessao']['usuario'])){
        require_once ABSPATH . 'Views/login/index.php';
    }else{
        require_once ABSPATH . 'Views/includes/cabecalho.inc.php';  
    ?>
        <div class="jumbotron">
            <h1 style="margin-top: 0;">Seja bem-vindo(a)</h1>
            <p>
                Exemplo CRUD básico.
            </p>
        </div>

        <?php 
        require_once ABSPATH . 'Views/includes/rodape.inc.php';
    }
?>
