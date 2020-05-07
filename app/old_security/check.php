<?php
//inicjacja mechanizmu sesji
if (session_status() == PHP_SESSION_NONE){
session_start();
}

//pobranie roli
$role = isset($_SESSION['role']) ? $_SESSION['role'] : '';

//jeśli brak parametru (niezalogowanie) to idź na stronę logowania
if ( empty($role) ){
	include $conf->ROOT_PATH.'/app/security/login.php';
	//zatrzymaj dalsze przetwarzanie skryptów
	exit();
}
//jeśli ok to idź dalej