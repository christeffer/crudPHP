<?php

namespace Controllers;

use Classes\Controller;
use Models\EnderecoModel;

class EnderecosController extends Controller {
    
    private $endereco_model;
    
    public function __construct() {
        
        $this->endereco_model = new EnderecoModel();
        
        parent::__construct();
    }

    public function index() {
        
        $cliente_id = array_get( $_GET, 'cliente_id' );        
        $enderecos = $this->endereco_model->filtrar_por_cliente( $cliente_id );
        
        require_once ABSPATH . 'Views/enderecos/index.php';
    }
    
    public function form() {
        
        $endereco_id = array_get( $_GET, 'id' );
        $endereco = $this->endereco_model->filtrar_por_id( $endereco_id );
            
        require_once ABSPATH . 'Views/enderecos/form.php';
    }
    
    public function salvar() {
        
        $endereco = (object) $_POST;
        
        $this->endereco_model->salvar( $endereco );
        
        header( 'Location: ' . HOME_URL . 'clientes' );
    }    
    
    public function excluir() {        
        
        $endereco_id = $_GET['id'];        
        
        $this->endereco_model->excluir( $endereco_id );        
        
        header( 'Location: ' . HOME_URL . 'enderecos' );
    }

}