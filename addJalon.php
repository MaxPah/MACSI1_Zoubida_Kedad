<!DOCTYPE html>
<?php 
	include("connexion.php");
?>
<html lang="fr">

	<head>
			<title>Ajout d'un jalon</title>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

			<link rel="icon" type="image/x-icon" href="img/favicon.png"/>
			<link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen"/> 
			<link rel="stylesheet" href="gs.css" type="text/css" media="screen"/> 
	</head>
<?php
	// Récupération de l'id du projet
	if(isset($_POST['nameP'])) {
		$nameProject=$_POST['nameP'];
	}
	$sqlIdProject= "	SELECT id_projet
						FROM projet
						WHERE nom = '$nameProject'";
	$reqIdProject=mysql_query($sqlIdProject);
	$idProjectArray= mysql_fetch_array($reqIdProject);
	$idProject=$idProjectArray['id_projet'];
	
	
	// Récupération de l'id de la phase
	if(isset($_POST['namePh'])) { 
		$namePhase=$_POST['namePh'];
	}
	$sqlIdPhase= "  SELECT id_phase
					FROM phase
					WHERE nom = '$namePhase'";
	$reqIdPhase=mysql_query($sqlIdPhase) or die ('Erreur SQL !'.$reqIdPhase.'<br />'.mysql_error());
	$resIdPhase= mysql_fetch_array($reqIdPhase);
	$idPhase=$resIdPhase['id_phase'];
	
	// Récupération de toutes les autres valeurs à insérer 
	if(isset($_POST['nameJ'])) {
		$nameJalon = $_POST['nameJ'];
		$dateJalon = $_POST['dateJ'];
		$descJalon = $_POST['nDJ'];
		$reqSqlAddJalon = " INSERT INTO jalon(nom, date, evenement, id_phase, id_projet)
							VALUES ('$nameJalon', '$dateJalon', '$descJalon', '$idPhase', '$idProject')";
		mysql_query($reqSqlAddJalon) or die ('Erreur SQL !'.$reqSqlAddJalon.'<br />'.mysql_error());
	}
?>
	<body>
		<div id="bloc_central">
			<form method="POST" action="resume.php">
				<?php echo "<label class=\"form-control\">".$nameJalon." a bien &eacute;t&eacute; ajout&eacute; aux jalons</label>";
				echo "<input type = \"hidden\" name=\"nameP\" value=\"".$_POST['nameP']."\">";?>
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