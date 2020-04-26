<?php

class Messages {

    private $errors = array();
    private $info = array();
    private $nr = 0;

    function addError($message) {
        $this->errors[] = $message;
        $this->nr++;
    }

    function addInfo($message) {
        $this->info[] = $message;
        $this->nr++;
    }

    function isEmpty() {
        return $this->nr == 0;
    }

    function isError() {
        return count($this->errors) > 0;
    }

    function isInfo() {
        return count($this->info) > 0;
    }

    function getErrors() {
        return $this->errors;
    }

    function getInfo() {
        return $this->info;
    }

    function clear() {
        $this->errors = array();
        $this->info = array();
        $this->nr = 0;
    }

}
