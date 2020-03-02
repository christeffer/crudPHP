<?php


namespace Controllers;

use Classes\Controller;
use Models\LoginModel;

class LoginController extends Controller {
    
    private $login_model;
    
    public function __construct() {
        
        $this->login_model = new LoginModel();
        
        parent::__construct();
    }

    public function logar(){
        $login = $_POST["login"];
        $senha = $_POST["senha"];
        
        $senhaHash = $this->login_model->logar( $login );        
        if(!isset($senhaHash)){
            $erro = "Usuário não existe";
            require_once ABSPATH . 'Views/login/index.php';
            
        }else{
            if (password_verify($senha, $senhaHash->senha)) {                
                
				session_regenerate_id();
                $session_id = session_id();
                
                $_SESSION['usuarioSessao']['sessao_id'] = $session_id;
                $_SESSION['usuarioSessao']['usuario'] = $login;                
                $erro = "";
                require_once ABSPATH . 'Views/home/index.php';
            } else {
                $erro = "Senha Incorreta";
                require_once ABSPATH . 'Views/login/index.php';
            }
        }        
    }

    public function sair( $redireciona = false ) {
		$_SESSION['usuarioSessao'] = array();
		
		unset( $_SESSION['usuarioSessao'] );
		
		session_regenerate_id();
		
		if ( $redirect === true ) {
			$this->index();
		}
	}
    
    public function index() {
        
        require_once ABSPATH . 'Views/login/index.php';
    }
}