<!DOCTYPE HTML>
<link rel="shortcut icon" href= "http://localhost:80/progressus/assets/images/kalkulatorus.png">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Logowanie</title>
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
        </link>
</head>
<body>

<div style="width:90%; margin: 2em auto;">

<form action="<?php print($conf->APP_ROOT); ?>/app/security/security.php?security=login" method="post" class="pure-form pure-form-stacked">
	<legend>Logowanie</legend>
	<fieldset>
		<label for="id_login">login: </label>
		<input id="id_login" type="text" name="login" />
		<label for="id_pass">password: </label>
		<input id="id_pass" type="password" name="pass" />
	</fieldset>
	<input type="submit" value="zaloguj" class="pure-button pure-button-primary"/>
</form>	 

    
<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>
    
----------------------------------------------------------------------------------------------------------------------------
<form action="<?php print($conf->APP_ROOT); ?>/app/security/security.php?security=signin" method="post" class="pure-form pure-form-stacked">    
    	<legend>Rejestracja</legend>
	<fieldset>
		<label for="id_login2">login: </label>
		<input id="id_login2" type="text" name="login2" />
		<label for="id_pass2">password: </label>
		<input id="id_pass2" type="password" name="pass2" />
	</fieldset>
	<input type="submit" value="zarejestruj" class="pure-button pure-button-primary"/>
<form>    
    
<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages2)) {
	if (count ( $messages2 ) > 0) {
		echo '<ol style="padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ( $messages2 as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>    
    
    
    
    
</div>

</body>
</html>