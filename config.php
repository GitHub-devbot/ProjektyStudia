
<?php

require_once 'config.class.php';

$conf = new config();

$conf->SERVER_NAME =  'localhost:80';
$conf->SERVER_URL = 'http://'.$conf->SERVER_NAME;
$conf->APP_ROOT = '/progressus';
$conf->APP_URL = $conf->SERVER_URL.$conf->APP_ROOT;
//define('_APP_URL', 'http://localhost:80/kontrolerphp');
$conf->ROOT_PATH = dirname(__FILE__);
define('_ROOT_PATH', $conf->ROOT_PATH);
?>
