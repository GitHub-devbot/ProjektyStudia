<?php

class PagesCtrl {

    function showleft() {
        include _ROOT_PATH . '/parts/top.php';
        include _ROOT_PATH . '/parts/sidebar-left.php';
        include _ROOT_PATH . '/parts/bottom.php';
    }

    function showright() {
        include _ROOT_PATH . '/parts/top.php';
        include _ROOT_PATH . '/parts/sidebar-right.php';
        include _ROOT_PATH . '/parts/bottom.php';
    }

}
