<!DOCTYPE html>
<?php 
	include("connexion.php");
?>
<html lang="fr">

	<head>
			<title>Suppression d'un sous projet</title>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

			<link rel="icon" type="image/x-icon" href="img/favicon.png"/>
			<link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen"/> 
			<link rel="stylesheet" href="gs.css" type="text/css" media="screen"/> 
	</head>
<?php
	if(isset($_POST['nameP'])) {
		$nameProject=$_POST['nameP'];
	}
	$sqlIdProject= "SELECT id_projet
				    FROM projet
				    WHERE nom = '$nameProject'";
	$reqIdProject=mysql_query($sqlIdProject);
	$idProjectArray= mysql_fetch_array($reqIdProject);
	$idProject=$idProjectArray['id_projet'];
	
	if(isset($_POST['nameSP'])) {
		$nameSP=$_POST['nameSP'];
		
		$sqlIdLot = ' SELECT id_lot 
					  FROM sousprojet
					  WHERE nom = "'.$nameSP.'"';
		$reqIdLot=mysql_query($sqlIdLot);
		$resIdLot = mysql_fetch_array($reqIdLot);
		$idLot = $resIdLot['id_lot'];
		
		$SqlDelSP = 'DELETE FROM sousprojet 
					 WHERE nom ="'.$nameSP.'" 
					 AND id_lot ="'.$idLot.'"';
		mysql_query($SqlDelSP) or die ('Erreur SQL !'.$SqlDelSP.'<br />'.mysql_error());
	}
?>
	<body>
		<div id="bloc_central">
			<form method="POST" action="resume.php">
				<?php echo "<label class=\"form-control\">".$nameSP." a bien &eacute;t&eacute; supprim&eacute; des sous-projets</label>";
				echo "<input type = \"hidden\" name=\"nameP\" value=\"".$nameProject."\">"; ?>
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