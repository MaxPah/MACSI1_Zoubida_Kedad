<!DOCTYPE html>
<?php 
	include("connexion.php");
?>
<html lang="fr">

	<head>
			<title>Ajout d'un livrable</title>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

			<link rel="icon" type="image/x-icon" href="img/favicon.png"/>
			<link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen"/> 
			<link rel="stylesheet" href="gs.css" type="text/css" media="screen"/> 
	</head>
<?php
		
	if(isset($_POST['nameL'])) {
		$nameLivrable = $_POST['nameL'];
		$descLivrable = $_POST['descL'];
		$reqSqlAddLivrable = "INSERT INTO livrable(nom,id_projet,description) VALUES ('".$nameLivrable."', '".$_SESSION['idProject']."','".$descLivrable."')";
		mysql_query($reqSqlAddLivrable) or die ('Erreur SQL !'.$reqSqlAddLivrable.'<br />'.mysql_error());
	}
?>
	<body>
		<div id="bloc_central">
			<form method="POST" action="resume.php">
				<?php echo "<label class=\"form-control\">".$nameLivrable." a bien &eacute;t&eacute; ajout&eacute; aux livrables</label>";
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