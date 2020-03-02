<?php

namespace Controllers;

use Classes\Controller;

class HomeController extends Controller {

    
    public function index() {        
        
        require_once ABSPATH . 'Views/home/index.php';
    }

}