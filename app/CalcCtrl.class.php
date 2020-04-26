<?php

require_once $conf->ROOT_PATH . "/app/CalcResult.class.php";
require_once $conf->ROOT_PATH . "/core/Messages.class.php";
require_once $conf->ROOT_PATH . "/app/CalcForm.class.php";

class CalcCtrl {

    public $messages;
    public $form;
    public $result;

    public function __construct() {
        $this->messages = new Messages();
        $this->form = new CalcForm();
        $this->result = new CalcResult();
    }

    function pobierz() {

        $this->form->x = isset($_REQUEST ['x']) ? $_REQUEST ['x'] : null;
        $this->form->y = isset($_REQUEST ['y']) ? $_REQUEST ['y'] : null;
        $this->form->z = isset($_REQUEST ['z']) ? $_REQUEST ['z'] : null;
    }

    function waliduj() {

        if (!(isset($this->form->x) && isset($this->form->y) && isset($this->form->z))) {

            $this->messages->addError('Błędne wywołanie aplikacji. Brak jednego z parametrów.');
        }

        if ($this->form->x == "") {
            $this->messages->addError('Nie podano kapitału początkowego');
        }
        if ($this->form->y == "") {
            $this->messages->addError('Nie podano oprocentowania');
        }
        if ($this->form->z == "") {
            $this->messages->addError('Nie podano liczby miesięcy');
        }

        if (empty($messages)) {

            if (!is_numeric($this->form->z)) {
                $this->messages->addError('Trzecia wartość nie jest liczbą całkowitą');
            }
        }

        return $this->messages->isEmpty();
    }

    function wykonaj() {

        $this->form->x = floatval($this->form->x);
        $this->form->y = floatval($this->form->y);
        $this->form->z = intval($this->form->z);

        for ($licz = 0; $licz < $this->form->z; $licz++) {
            $this->form->x = $this->form->x * (($this->form->y / 100) / 12 + 1);
        }

        $this->result->result = $this->form->x;
        
    }

    function wyswietl() {
        include 'calcview.php';
    }

    function akcjaA() {
        $this->wyswietl();
    }

    function akcjaB() {
        $this->pobierz();
        if ($this->waliduj()) {
            $this->wykonaj();
        }
        $this->wyswietl();
    }

}
