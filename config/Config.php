<?php
session_start();
ob_start();

//url padrao do site
define('URL', 'http://192.168.1.7/projetoPassoni/');
define('URLADM', 'http://192.168.1.7/projetoPassoni/adm/');

//controller e métodos padrão
define('CONTROLLER', 'Home');
define('METHOD', 'index');
define('ERROR404', 'Error404');

//Dados de acesso ao BD
define('HOST', '192.168.1.7');
define('USER', 'root');
define('PASS', '');
define('DBNAME', 'projetopassoni');
