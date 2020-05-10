<?php
$security = isset($_REQUEST['security']) ? $_REQUEST['security'] : '';
switch ($security) {
    default: {}
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
            require_once dirname(__FILE__) . '/../../config.php';
            session_start();
            session_destroy();
            header("Location: " . $conf->APP_URL);
            break;
        }
    case 'login': {
            require_once dirname(__FILE__) . '/../../config.php';

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
}