<?php


namespace Classes;

class Model {

    public static $mysqli = false;
    
    protected $db = false;

    public function __construct() {
        
        if ( Model::$mysqli === false ) {
            
            Model::$mysqli = new \mysqli(
                    HOST,
                    USUARIO,
                    SENHA,
                    BANCO_DE_DADOS
            );
            
            if ( Model::$mysqli->connect_errno ) {
                die( 'Falha na conexão com o MySQL: ' . Model::$mysqli->connect_error );
            }
            
            Model::$mysqli->set_charset( 'utf8' );
        }
        
        $this->db = Model::$mysqli;
    }
    
}