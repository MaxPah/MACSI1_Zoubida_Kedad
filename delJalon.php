<!DOCTYPE html>
<?php 
	include("connexion.php");
?>
<html lang="fr">

	<head>
			<title>Suppression d'un jalon</title>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

			<link rel="icon" type="image/x-icon" href="img/favicon.png"/>
			<link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen"/> 
			<link rel="stylesheet" href="gs.css" type="text/css" media="screen"/> 
	</head>
<?php
		
	if(isset($_POST['idJ'])) {
		$valLot=explode('-',$_POST['idJ']);
		
		$SqlDelJ = " DELETE FROM jalon 
					 WHERE id_jalon =".$valLot[1]." 
					 AND id_projet =".$_SESSION['idProject'];
		mysql_query($SqlDelJ) or die ('Erreur SQL !'.$SqlDelJ.'<br />'.mysql_error());
	}
?>
	<body>
		<div id="bloc_central">
			<form method="POST" action="resume.php">
				<?php echo "<label class=\"form-control\">".$valLot[0]." a bien &eacute;t&eacute; supprim&eacute; des jalons</label>";
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