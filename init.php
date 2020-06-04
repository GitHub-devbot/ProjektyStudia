<?php

require_once 'config.php';
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';

require_once 'core/Router.class.php'; //załaduj i stwórz router
$router = new core\Router();
function &getRouter(): core\Router {
    global $router; return $router;
}




require $conf->ROOT_PATH . '/Medoo/Medoo.php';
use Medoo\Medoo;

$database = new Medoo([
	'database_type' => 'mysql',
	'database_name' => 'calc',
	'server' => 'localhost',
	'username' => 'root',
	'password' => '',
        'charset' => 'utf8mb4',
	'collation' => 'utf8mb4_polish_ci',
	'port' => 3306
]);

$database->insert("wynik", [
	"kwota" => "5"
]);


// Obecnie to co poniżej nieużywane (może zawierać błędy), być może przyda się w następnych lekcjach

/*
function &getConf() {
    global $conf;
    return $conf;
}

require_once getConf()->_ROOT_PATH . '/app/CalcMessages.class.php';
$msgs = new Messages();

function &getMessages() {
    global $msgs;
    return $msgs;
}

$action = GetFromRequest('action');
 */

