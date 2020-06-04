<?php
require_once $conf->ROOT_PATH . "/app/CalcResult.class.php";
require_once $conf->ROOT_PATH . "/core/Messages.class.php";
require_once $conf->ROOT_PATH . "/app/CalcForm.class.php";
require_once $conf->ROOT_PATH . "/lib/smarty/Smarty.class.php";
require $conf->ROOT_PATH . '/Medoo/Medoo.php';
use Medoo\Medoo;

class CalcCtrl {

    public $messages;
    public $form;
    public $result;
    private $bufor;

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
        $this->bufor = floatval($this->form->x);
        for ($licz = 0; $licz < $this->form->z; $licz++) {
            $this->form->x = $this->form->x * (($this->form->y / 100) / 12 + 1);
        }

        $this->result->result = $this->form->x;
        

              
    }

    function zapisz(){    
       
        $database = new Medoo([
	'database_type' => 'mysql',
	'database_name' => 'calc',
	'server' => 'localhost',
	'username' => 'root',
	'password' => '',
        'charset' => 'utf8mb4',
	'collation' => 'utf8mb4_polish_ci',
	'port' => 3306
]);
        
        
        $database->insert("wynik", [
	"kwota" => $this->bufor,
	"oprocentowanie" => floatval($this->form->y),
        "ilosc_miesiecy" => intval($this->form->z),    
        "wynik" => floatval($this->form->x),
        "data"  => date("Y-m-d H:i:s")
]);   
        
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
            $this->zapisz();
        }
        $this->wyswietl();
    }

    function smarty(){
        
    $smarty = new Smarty();

$smarty->assign('app_url',_APP_URL);
$smarty->assign('root_path',_ROOT_PATH);
$smarty->assign('page_title','Progressus');
$smarty->assign('page_description','Kalkulator Kredytowy');
$smarty->assign('page_header','Progressus');

//pozostałe zmienne niekoniecznie muszą istnieć, dlatego sprawdzamy aby nie otrzymać ostrzeżenia
$smarty->assign('form',$this->form);
$smarty->assign('result',$this->result);
$smarty->assign('messages',$this->messages);   
        
$smarty->display( _ROOT_PATH . '/app/calcview.tpl');
        
    }
    
    
    
}
