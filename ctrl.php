<?php

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';

switch ($action) {
    default: {
        
            $ctrl = new CalcCtrl();
            $ctrl->akcjaA(); 
            include $conf->ROOT_PATH.'/parts/bottom.php'; 
            break;
        }
    case 'Oblicz': {
            $ctrl = new CalcCtrl();        
            $ctrl->akcjaB();
            include $conf->ROOT_PATH.'/parts/bottom.php'; 
            break;
        }
    case 'left': {
  include $conf->ROOT_PATH.'/parts/top.php';    
  include $conf->ROOT_PATH.'/parts/sidebar-left.php';
  include $conf->ROOT_PATH.'/parts/bottom.php'; 
            break;
        }
    case 'right': {
  include $conf->ROOT_PATH.'/parts/top.php';       
  include $conf->ROOT_PATH.'/parts/sidebar-right.php';
  include $conf->ROOT_PATH.'/parts/bottom.php';
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
  
  
 
