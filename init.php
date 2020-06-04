<?php

require_once 'config.php';
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';

require_once 'core/Router.class.php'; //załaduj i stwórz router
$router = new core\Router();
function &getRouter(): core\Router {
    global $router; return $router;
}

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

