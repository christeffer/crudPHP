<?php

namespace Controllers;

use Classes\Controller;
use Models\ClienteModel;

class ClientesController extends Controller {
    
    private $cliente_model;
    
    public function __construct() {
        
        $this->cliente_model = new ClienteModel();
        
        parent::__construct();
    }

    public function index() {
        
        $clientes = $this->cliente_model->filtrar_todos();
        
        require_once ABSPATH . 'Views/clientes/index.php';
    }
    
    public function form() {
        
        $cliente_id = array_get( $_GET, 'id' );
        $cliente = $this->cliente_model->filtrar_por_id( $cliente_id );
            
        require_once ABSPATH . 'Views/clientes/form.php';
    }
    
    public function salvar() {
        
        $cliente = (object) $_POST;
        
        $this->cliente_model->salvar( $cliente );
        
        header( 'Location: ' . HOME_URL . 'clientes' );
    }    
    
    public function excluir() {        
        
        $cliente_id = $_GET['id'];        
        
        $this->cliente_model->excluir( $cliente_id );        
        
        header( 'Location: ' . HOME_URL . 'clientes' );
    }

}