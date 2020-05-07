<?php

//require_once 'config.php';

require_once 'core/Config.class.php';
$conf = new Config();
require_once 'config.php'; //ustaw konfigurację

function &getConf(){ global $conf; return $conf; }

//załaduj definicję klasy Messages i stwórz obiekt
require_once $conf->ROOT_PATH.'/core/Messages.class.php';
$msgs = new Messages();

function &getMessages(){ global $msgs; return $msgs; }

//przygotuj Smarty, twórz tylko raz - wtedy kiedy potrzeba
$smarty = null;	
function &getSmarty(){
	global $smarty;
	if (!isset($smarty)){
		//stwórz Smarty
		include_once 'lib/smarty/Smarty.class.php';
		$smarty = new Smarty();	
		//przypisz konfigurację i messages
		$smarty->assign('conf',getConf());
		$smarty->assign('msgs',getMessages());
		//zdefiniuj lokalizację widoków (aby nie podawać ścieżek przy odwoływaniu do nich)
		$smarty->setTemplateDir(array(
			'one' => getConf()->ROOT_PATH.'/app',
			'two' => getConf()->ROOT_PATH.'/app/security'
		));
	}
	return $smarty;
}

require_once 'core/ClassLoader.class.php'; //załaduj i stwórz loader klas
$cloader = new core\ClassLoader();
function &getLoader() {
    global $cloader;
    return $cloader;
}

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';

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

