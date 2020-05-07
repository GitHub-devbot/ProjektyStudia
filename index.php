<?php

require_once 'init.php';


switch ($action) {
    default: { // publiczne
            require $conf->ROOT_PATH . '/app/CalcCtrl.class.php';
            $ctrl = new CalcCtrl();
            $ctrl->akcjaA();
            break;
        }
    case 'Oblicz': { // niepubliczne
            include $conf->ROOT_PATH . '/check.php';
            require $conf->ROOT_PATH . '/app/CalcCtrl.class.php';
            $ctrl = new CalcCtrl();
            $ctrl->akcjaB();
            break;
        }
    case 'left': { // publiczne
            include $conf->ROOT_PATH.'/app/PagesCtrl.class.php';
            $ctrl = new PagesCtrl();
            $ctrl->showleft();
            break;
        }
    case 'right': { // publiczne
            include $conf->ROOT_PATH.'/app/PagesCtrl.class.php';
            $ctrl = new PagesCtrl();
            $ctrl->showright();
            break;
        }
}
	
