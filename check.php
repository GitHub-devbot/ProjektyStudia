<?php

use app\security\User;


 if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


 $user = isset($_SESSION['user']) ? unserialize($_SESSION['user']) : null;

if ( ! (isset($user) && isset($user->login) && isset($user->role)) ){
        require $conf->ROOT_PATH . '/app/security/LoginCtrl.class.php';
	$ctrl2 = new LoginCtrl();
	$ctrl2->generateView();	
	//i zatrzymaj dalsze przetwarzanie skryptów
	exit();
}
