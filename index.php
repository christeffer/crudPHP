<?php

require_once 'config.php';

session_start();

if ( ! defined( 'DEBUG' ) || DEBUG === false ) {

    error_reporting( 0 );
    ini_set( "display_errors", 0 );
}
else {

    error_reporting( E_ALL ^ E_NOTICE );
    ini_set( "display_errors", 1 );
}

function __autoload( $nome_da_classe ) {
    $arquivo = ABSPATH . str_replace( '\\', DIRECTORY_SEPARATOR, $nome_da_classe ) . '.php';
    
    if ( is_file( $arquivo ) ) {
        require_once $arquivo;
    }
}

function array_get( $array, $key ) {
    
    if ( isset( $array[$key] ) && ! empty( $array[$key] ) ) {
        return $array[$key];
    }

    return null;
}

global $controlador, $acao, $parametros;

if ( isset( $_GET['route'] ) ) {

    $route = $_GET['route'];

    $route = rtrim( $route, '/' );
    $route = filter_var( $route, FILTER_SANITIZE_URL );

    $route = explode( '/', $route );

    $controlador = ucfirst( array_get( $route, 0 ) );
    $controlador .= 'Controller';
    $acao = array_get( $route, 1 );

    if ( array_get( $route, 2 ) ) {
        unset( $route[0] );
        unset( $route[1] );

        $parametros = array_values( $route );
    }
}

if ( ! $controlador ) {

    require_once ABSPATH . 'Controllers/HomeController.php';

    $controlador = new Controllers\HomeController();

    $controlador->index();
    
    return;
}

if ( ! file_exists( ABSPATH . 'Controllers/' . $controlador . '.php' ) ) {
    
    require_once ABSPATH . 'Views/erros/404.php';

    return;
}

require_once ABSPATH . 'Controllers/' . $controlador . '.php';

$controlador_namespace = "Controllers\\{$controlador}";

$controlador = new $controlador_namespace( $parametros );
 
if ( method_exists( $controlador, $acao ) ) {
    $controlador->{$acao}( $parametros );

    return;
}

if ( ! $acao && method_exists( $controlador, 'index' ) ) {
    $controlador->index( $parametros );

    return;
}

require_once ABSPATH . 'Views/erros/404.php';

return;