<?php
session_start();
ob_start();

//url padrao do site
define('URL', 'http://localhost/projetoPassoni/');
define('URLADM', 'http://localhost/projetoPassoni/adm/');

//controller e métodos padrão
define('CONTROLLER', 'Home');
define('METHOD', 'index');
define('ERROR404', 'Error404');

//Dados de acesso ao BD
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DBNAME', 'projetoPassoni');