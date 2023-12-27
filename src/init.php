<?php

// constantes com as credenciais de acesso ao banco MySQL
define('DB_HOST', '127.0.0.1');
define('DB_USER', 'default');
define('DB_PASS', '123456');
define('DB_CPD', 'cpd');
define('DB_ACESSO', 'acesso');
define('DB_CONF', 'conf');
define('DB_TRATATIVA', 'tratativa');
define('DB_INDICADORES', 'indicadores');
define('DB_EERG', 'eerg');
define('DB_PRSC', 'presenca');
define('DB_RG', 'grandesredes');
define('DB_PORT', 'acessostcruz');
	
// habilita todas as exibições de erros
ini_set('display_errors', true);
error_reporting(E_ALL);

date_default_timezone_set('America/Sao_Paulo');

// inclui o arquivo de funçõees
require_once 'functions.php';


