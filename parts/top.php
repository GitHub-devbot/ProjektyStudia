<?php
global $conf;
?>
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Kalkulatorus - darmowy kalkulator lokat</title>

	<link rel="shortcut icon" href= "<?php print($conf->APP_URL); ?>/assets/images/kalkulatorus.png">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="<?php print($conf->APP_URL); ?>/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php print($conf->APP_URL); ?>/assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php print($conf->APP_URL); ?>/assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="<?php print($conf->APP_URL); ?>/assets/css/main.css">
        	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="<?php print($conf->APP_URL); ?>/assets/js/headroom.min.js"></script>
	<script src="<?php print($conf->APP_URL); ?>/assets/js/jQuery.headroom.min.js"></script>
	<script src="<?php print($conf->APP_URL); ?>/assets/js/template.js"></script>   
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">

</head>

<body class="home">
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<a class="navbar-brand" href= " http://localhost:80/progressus/index.php"><img src="http://localhost:80/progressus/assets/images/logo.png" alt="Progressus HTML5 template"></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
					<li><a href="http://localhost:80/progressus/index.php">Strona Domowa</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Więcej stron <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="http://localhost:80/progressus/index.php?action=left">Memy z Januszem</a></li>
							<li><a href="http://localhost:80/progressus/index.php?action=right">Memy z Januszem 2</a></li>
						</ul>
					</li>
                                        <li><a class="btn" href="<?php print($conf->APP_URL . '/app/security/LoginCtrl.class.php->doLogout'); ?>"> Wyloguj</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div> 
	<!-- /.navbar -->


