<!DOCTYPE html>
<?php 
	include("connexion.php");
?>
<html lang="fr">

	<head>
			<title>Ajout d'une Ressource</title>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

			<link rel="icon" type="image/x-icon" href="img/favicon.png"/>
			<link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen"/> 
			<link rel="stylesheet" href="gs.css" type="text/css" media="screen"/> 
	</head>
<?php
		$nameRess = $_POST['nameRess'];
		$nameProject = $_SESSION['nameP'];
		$nameQual = $_POST['nameQual'];
		$nameCout = $_POST['nameCout'];
		$nameType = $_POST['nameType'];

		$reqSqlAddRess = 'INSERT INTO ressource(nom,qualification,cout, type) VALUES ("'.$nameRess.'", "'.$nameQual.'", "'.$nameCout.'", "'.$nameType.'")';
		mysql_query($reqSqlAddRess) or die ('Erreur SQL !'.mysql_error());
?>
	<body>
		<div id="bloc_central">
			<!-- Créer un nouveau projet-->
			<form method="POST" action="resume.php">
				<?php echo "<label class=\"form-control\">".$nameRess." a bien &eacute;t&eacute; ajout&eacute; aux ressources</label>";
				?>
				<br/>	
				<button class="btn btn-success" name ="old" type="submit" class="btn btn-primary" >Retourner au menu principal</button>
			</form>
			<br/><br/>
			<form action="index.php">
				<button class="btn btn-default" >Fermer le projet</button>
			</form>
		</div>		 
	</body>
</html>