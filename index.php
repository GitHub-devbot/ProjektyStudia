<?php

require_once 'init.php';
include $conf->ROOT_PATH . '/app/security/check.php';

switch ($action) {
    default: {
            require $conf->ROOT_PATH . '/app/CalcCtrl.class.php';
            $ctrl = new CalcCtrl();
            $ctrl->akcjaA();
            break;
        }
    case 'Oblicz': {
            require $conf->ROOT_PATH . '/app/CalcCtrl.class.php';
            $ctrl = new CalcCtrl();
            $ctrl->akcjaB();
            break;
        }
    case 'left': {
            include $conf->ROOT_PATH.'/app/PagesCtrl.class.php';
            $ctrl = new PagesCtrl();
            $ctrl->showleft();
            break;
        }
    case 'right': {
            include $conf->ROOT_PATH.'/app/PagesCtrl.class.php';
            $ctrl = new PagesCtrl();
            $ctrl->showright();
            break;
        }
}
	
