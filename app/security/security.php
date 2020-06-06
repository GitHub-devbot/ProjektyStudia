<?php

require_once dirname(__FILE__) . '/../../config.php';
require_once $conf->ROOT_PATH . '/Medoo/Medoo.php';
use Medoo\Medoo;




$security = isset($_REQUEST['security']) ? $_REQUEST['security'] : '';
switch ($security) {
    default: {
            
        }
    case 'check': {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $role = isset($_SESSION['role']) ? $_SESSION['role'] : '';
            if (empty($role)) {
                include $conf->ROOT_PATH . '/app/security/login_view.php';
                exit();
            }
            break;
        }
    case 'logout': {
            session_start();
            session_destroy();
            header("Location: " . $conf->APP_URL);
            break;
        }
    case 'login': {

            function getParamsLogin(&$form) {
                $form['login'] = isset($_REQUEST ['login']) ? $_REQUEST ['login'] : null;
                $form['pass'] = isset($_REQUEST ['pass']) ? $_REQUEST ['pass'] : null;
            }

            function validateLogin(&$form, &$messages) {
                // sprawdzenie, czy parametry zostały przekazane
                if (!(isset($form['login']) && isset($form['pass']))) {
                    return false;
                }
                if ($form['login'] == "") {
                    $messages [] = 'Nie podano loginu';
                }
                if ($form['pass'] == "") {
                    $messages [] = 'Nie podano hasła';
                }
                if (count($messages) > 0)
                    return false;
                //---------------------------
                if ($form['login'] == "admin" && $form['pass'] == "admin") {
                    session_start();
                    $_SESSION['role'] = 'admin';
                    return true;
                }
                if ($form['login'] == "user" && $form['pass'] == "user") {
                    session_start();
                    $_SESSION['role'] = 'user';
                    return true;
                }
                //----------------------------
                $messages [] = 'Niepoprawny login lub hasło';
                return false;
            }

            $form = array();
            $messages = array();
            getParamsLogin($form);
            if (!validateLogin($form, $messages)) {
                include $conf->ROOT_PATH . '/app/security/login_view.php';
            } else {
                header("Location: " . $conf->APP_URL);
            }
            break;
        }
    case 'signin':

        function getParamsLogin(&$form) {
            $form['login2'] = isset($_REQUEST ['login2']) ? $_REQUEST ['login2'] : null;
            $form['pass2'] = isset($_REQUEST ['pass2']) ? $_REQUEST ['pass2'] : null;
        }

        function validateLogin(&$form, &$messages2) {
            // sprawdzenie, czy parametry zostały przekazane
            if (!(isset($form['login2']) && isset($form['pass2']))) {
                return false;
            }
            if ($form['login2'] == "") {
                $messages2 [] = 'Nie podano loginu';
            }
            if ($form['pass2'] == "") {
                $messages2 [] = 'Nie podano hasła';
            }
            if (count($messages2) > 0) {
                return false;
            } else {
                session_start();
                $_SESSION['role'] = 'user';
                return true;
            }
        }

        function zapisz(&$form) { 
            
            if (isset($database) == false) {
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
            }
            
            
            $database->insert("user", [
                "user_login" => $form['login2'],
                "user_password" => $form['pass2'],
                "signin_date" => date("Y-m-d H:i:s")
            ]);
        }

        $form = array();
        $messages2 = array();
        getParamsLogin($form);
        if (!validateLogin($form, $messages2)) {
            include $conf->ROOT_PATH . '/app/security/login_view.php';
        } else {
        //    baza();
            zapisz($form);
            header("Location: " . $conf->APP_URL);
        }

        break;

    case 'showusers':

            if (isset($database) == false) {
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
            }
            
        $datas = $database->select("user", ["user_login","user_password"], ["user_id[>]" => 1]);

        foreach ($datas as $data) {
            print_r("login: " . $data["user_login"] . " - password: " . $data["user_password"] . "<br/>");
        }
        ?>
        <form action="<?php print($conf->APP_ROOT); ?>/index.php" method="post" class="pure-form pure-form-stacked">  
        	<input type="submit" value="powrót" class="pure-button pure-button-primary"/>
        <form>  
         <?php       
        break;
}