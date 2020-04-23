<!DOCTYPE html>

<?php
require_once 'config.php';
require_once $conf->ROOT_PATH.'/init.php';
include $conf->ROOT_PATH.'/app/security/check.php';		
$action;
include $conf->ROOT_PATH.'/ctrl.php';
?>	
