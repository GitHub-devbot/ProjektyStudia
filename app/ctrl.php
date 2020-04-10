<?php
require_once dirname(__FILE__) . '/../config.php';
//require_once _ROOT_PATH.'lib/smarty/Smarty.class.php';
require_once _ROOT_PATH . '/app/CalcCtrl.class.php';
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';

switch ($action) {
    default: {
        include _ROOT_PATH.'/parts/top.php';
        include _ROOT_PATH.'/parts/main.php';
            $ctrl = new CalcCtrl();
            $ctrl->construct();
            $ctrl->wyswietl();
        include _ROOT_PATH.'/parts/bottom.php';    
            
            break;
        }
    case 'Oblicz': {
        include _ROOT_PATH.'/parts/top.php';
        include _ROOT_PATH.'/parts/main.php';
            $ctrl = new CalcCtrl();
            $ctrl->kontroler();
        include _ROOT_PATH.'/parts/bottom.php'; 
            break;
        }
    case 'left': {
  include _ROOT_PATH.'/parts/top.php';    
  include _ROOT_PATH.'/parts/sidebar-left.php';
  include _ROOT_PATH.'/parts/bottom.php'; 
            break;
        }
    case 'right': {
    include _ROOT_PATH.'/parts/top.php';       
  include _ROOT_PATH.'/parts/sidebar-right.php';
  include _ROOT_PATH.'/parts/bottom.php';
            break;
        }
}









/*
$smarty = new Smarty();
$smarty->assign('app_url',_APP_URL);
$smarty->assign('root_path',_ROOT_PATH);
$smarty->assign('page_title','Kalkulatorus');
$smarty->assign('page_description','Kalkulatorus - kalkulator lokat');
$smarty->assign('page_header','Kalkulatorus');
$smarty->assign('form',$form);
$smarty->assign('result',$result);
$smarty->assign('messages',$messages);
$smarty->assign('info',$info);

$smarty->display(_ROOT_PATH.'/app/calc_view.php');
*/  
  
  
 
