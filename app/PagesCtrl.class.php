<?php

class PagesCtrl {

    function showleft() {
        include $conf->ROOT_PATH . '/parts/top.php';
        include $conf->ROOT_PATH . '/parts/sidebar-left.php';
        include $conf->ROOT_PATH . '/parts/bottom.php';
    }

    function showright() {
        include $conf->ROOT_PATH . '/parts/top.php';
        include $conf->ROOT_PATH . '/parts/sidebar-right.php';
        include $conf->ROOT_PATH . '/parts/bottom.php';
    }

}
