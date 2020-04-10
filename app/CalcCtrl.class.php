<?php

require_once _ROOT_PATH."/app/CalcForm.class.php";
require_once _ROOT_PATH."/app/CalcResult.class.php";
require_once _ROOT_PATH."/app/CalcMessages.class.php";


class CalcCtrl{
    
    public $messages;
    public $form;
    public $result;
    public function construct(){
        $this->messages = new CalcMessages();     
        $this->form = new CalcForm(); 
        $this->result = new CalcResult(); 
    }
    
    
    
    
    
function pobierz(){

$this->form->x = isset($_REQUEST ['x']) ? $_REQUEST ['x'] : null;
$this->form->y = isset($_REQUEST ['y']) ? $_REQUEST ['y'] : null;
$this->form->z = isset($_REQUEST ['z']) ? $_REQUEST ['z'] : null;
}        

function waliduj(){

if ( ! (isset($this->form->x) && isset($this->form->y) && isset($this->form->z))) {
	
	$this->messages->addError('Błędne wywołanie aplikacji. Brak jednego z parametrów.');
}

if ( $this->form->x == "") {
	$this->messages->addError('Nie podano kapitału początkowego');
}
if ( $this->form->y == "") {
	$this->messages->addError('Nie podano oprocentowania');
}
if ( $this->form->z == "") {
	$this->messages->addError('Nie podano liczby miesięcy');
}
	
if (empty( $messages )) {

	if (! is_numeric( $this->form->z )) {
		$this->messages->addError('Trzecia wartość nie jest liczbą całkowitą');
	}

}

return $this->messages->isEmpty();

}

function wykonaj(){

	$this->form->x = floatval($this->form->x);
	$this->form->y = floatval($this->form->y);
	$this->form->z = intval($this->form->z);        

for($licz=0; $licz<$this->form->z; $licz++){
$this->form->x = $this->form->x*(($this->form->y/100)/12 +1);
}

$this->result->result = $this->form->x;
//echo "<br>";
//echo 'OK - obliczono wynik: ' .$result; 
$this->wyswietl();
//include _ROOT_PATH.'/index.php';
}



function wyswietl(){
?>    
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator</title>
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
</link>    
</head>
<body>
<div style="width:90%; margin: 2em auto;">
<form action="<?php print(_APP_ROOT); ?>/index.php?action=Oblicz" method="post" class="pure-form pure-form-stacked">
<fieldset>
	<font size = 5> 
	<label for="id_x">Kalkulator lokat bankowych </label> 	
	<font size = 3> 
	<label for="id_x">(Konsolidacja środków następuje pod koniec każdego miesiąca) </label> 	
	<br>
	<label for="id_x">Ilość kapitału w zł: </label> 
	<input id="id_x" type="text" name="x" /><br />

	<label for="id_y">Oprocentowanie roczne: </label>
	<input id="id_y" type="text" name="y" /><br />

	<label for="id_z">Ilośc miesięcy: </label>
	<input id="id_z" type="text" name="z" /><br />


	<input type="submit" class="pure-button pure-button-active"value="Oblicz" />
	
	</fieldset>
</div>	
</form>
<?php
//wyświeltenie listy błędów, jeśli istnieją
if ($this->messages->isError()) {

		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f22; width:300px;">';
		foreach ( $this->messages->getErrors() as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
}
?>
<?php if (isset($this->result->result)){ 
//echo "<br>";  
//echo "OK - calc_view otrzymał dane"
?>
<div style="margin: 60px; padding: 10px; border-radius: 5px; background-color: #1f1; width:300px;">
<?php 
echo "Kapitał po " .$this->form->z; 
echo " miesiącach: " . $this->result->result; 
echo " zł"; ?>
</div>
<?php 

}

    
}

function kontroler(){
    $this->construct();
    $this->pobierz();
if ($this->waliduj()){          
?>
<html lang="en">
<embed src="http://localhost:80/progressus/assets/nice.mp3" loop="false" autostart="true" width="0" height="0">
<?php
$this->wykonaj();
//include _ROOT_PATH."/index.php";
}
else{
?>
<html lang="en">
<embed src="http://localhost:80/progressus/assets/onie.mp3" loop="false" autostart="true" width="0" height="0">
<?php
$this->wyswietl();

//include _ROOT_PATH."/index.php";
}   
}
}

