<!DOCTYPE html>
<?php 
	include("connexion.php");
?>
<html lang="fr">

	<head>
			<title>Suppression d'un livrable</title>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

			<link rel="icon" type="image/x-icon" href="img/favicon.png"/>
			<link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen"/> 
			<link rel="stylesheet" href="gs.css" type="text/css" media="screen"/> 
	</head>
<?php
	if(isset($_POST['idL'])) {
	$valLot=explode('-',$_POST['idL']);
		$reqSqlDelLivrable = "DELETE FROM livrable WHERE id_livrable =".$valLot[1]." and id_projet=".$_SESSION['idProject'];
		mysql_query($reqSqlDelLivrable) or die ('Erreur SQL !'.$reqSqldelLivrable.'<br />'.mysql_error());
	}
?>
	<body>
		<div id="bloc_central">
			<form method="POST" action="resume.php">
				<?php echo "<label class=\"form-control\">".$valLot[0]." a bien &eacute;t&eacute; supprim&eacute; des livrables</label>";
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