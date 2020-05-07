<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-07 22:24:15
  from 'D:\Prg\xampp\htdocs\Progressus\check.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eb46e6fedb350_29896240',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '74614c8aedc9cfe61e8fec5d77a491fdd37f6ef9' => 
    array (
      0 => 'D:\\Prg\\xampp\\htdocs\\Progressus\\check.php',
      1 => 1588882559,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eb46e6fedb350_29896240 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php
';?>
use app\security\User;

//inicjacja mechanizmu sesji
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// próba pobrania danych użytkownika z sesji

//$l = isset($_SESSION['user_login']) ? $_SESSION['user_login'] : null;
//$r = isset($_SESSION['user_role']) ? $_SESSION['user_role'] : null;
//$user = new User($l,$r);

// LUB pobranie całego obiektu z sesji
$user = isset($_SESSION['user']) ? unserialize($_SESSION['user']) : null;

//jeśli brak parametru lub danych (niezalogowanie) to wyświetl stronę logowania
if ( ! (isset($user) && isset($user->login) && isset($user->role)) ){
        require $conf->ROOT_PATH . '/app/security/LoginCtrl.class.php';
	$ctrl = new LoginCtrl();
	$ctrl->generateView();	
	//i zatrzymaj dalsze przetwarzanie skryptów
	exit();
}
//jeśli ok to idź dalej, a system ma do dyspozycji obiekt klasy User
<?php }
}
