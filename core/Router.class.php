<?php

namespace core;

use Exception;

class Router {

    public $action = null;

    public function setAction($action) {
        $this->action = $action;
    }

    public function getAction() {
        return $this->action;
    }

}
