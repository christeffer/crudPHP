<?php
/* 
 * Arquivo contendo configurações básicas do projeto
 */

/* Caminho raiz do servidor */
define( 'ABSPATH', realpath( dirname( __FILE__ ) ) . DIRECTORY_SEPARATOR );

/* Caminho da home */
define( 'HOME_URL', dirname( $_SERVER['PHP_SELF'] ) . DIRECTORY_SEPARATOR );

/* Endereço do servidor de banco de dados */
define( 'HOST', 'localhost' );

/* Usuário do banco de dados */
define( 'USUARIO', 'root' );

/* Senha do banco de dados */
define( 'SENHA', '' );

/* Nome do banco de dados */
define( 'BANCO_DE_DADOS', 'crud_system' );

/* Se você estiver desenvolvendo, modifique o valor para true */
define( 'DEBUG', true );