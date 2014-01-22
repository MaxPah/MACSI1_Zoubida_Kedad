<?php 
		session_start(); 
		$dbconn = mysql_connect("localhost", "root", "");
		$db = mysql_select_db("Cours_BD_WEB", $dbconn);
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
        <title>MACSI 1</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="description" content=""/>
		<meta name="keywords" content=""/>
        <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen"/>
		<link rel="icon" type="image/png" href="favicon.png" />
		<!--[if lte IE 8]>
			<script src="js/html5.js" type="text/javascript"></script>
		<![endif]-->

</head>
   	<body>
		<!-- BARRE DE NAVIGATION-->
		<nav class="navbar navbar-default" role="navigation">
 		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="#">Tache</a></li>
					<li><a href="#">Lot</a></li>
					<li><a href="#">Sous Projet</a></li>
					<li><a href="#">Jalons</a></li>
					<li><a href="#">Phase</a></li>
					<li><a href="#">Livrable</a></li>
				</ul>
				<form class="navbar-form navbar-right" role="search">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Rechercher">
					</div>
					<button type="submit" class="btn btn-default">Envoyer</button>
				</form>
			</div><!-- /.navbar-collapse -->
			<!-- BARRE DE NAVIGATION-->
		</nav>
		<div id="Prez">
			<div id="tache">tache<br/><br/><br/><br/><br/></div>
			<div id="lot">lot</div>
			<div id="sousprojet">sous proj</div>
			<div id="jalons">jalons</div>
			<div id="phase">phase</div>
			<div id="livrable">livrable</div>
		</div>
		
	</body>
</html>