<?php

namespace Models;

use Classes\Model;

class LoginModel extends Model {
    
    public function logar( $login) {
        
        $stmt = $this->db->prepare(
            'SELECT senha FROM usuarios
              WHERE login = ?'
        );
        
        
        $stmt->bind_param( 's', $login );
        
        $stmt->execute();
        
        return $stmt->get_result()->fetch_object();
    }
    
}

