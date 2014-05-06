<!DOCTYPE html>
<?php 
	include("connexion.php");
?>
<html lang="fr">

	<head>
			<title>Ajout d'une t&acirc;che</title>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

			<link rel="icon" type="image/x-icon" href="img/favicon.png"/>
			<link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen"/> 
			<link rel="stylesheet" href="gs.css" type="text/css" media="screen"/> 
	</head>
<?php
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
	
	// Récupération de l'id du sous projet
	if(isset($_POST['nameSP'])) { 
		$nameSousProj=$_POST['nameSP'];
	}
	$sqlIdSousProj= " 	SELECT id_sousprojet
						FROM sousprojet
						WHERE nom = '$nameSousProj'";
	$reqIdSousProj=mysql_query($sqlIdSousProj);
	$resIdSousProj= mysql_fetch_array($reqIdSousProj);
	$idSousProj=$resIdSousProj['id_sousprojet'];
	
	// Récupération de toutes les autres valeurs à insérer 
	if(isset($_POST['nameT'])) {
		$nameTache = $_POST['nameT'];
		$coutTache = $_POST['coutT'];
		$ddtoTache = $_POST['ddtoT'];
		$ddtaTache = $_POST['ddtaT'];
		$dftoTache = $_POST['dftoT'];
		$dftaTache = $_POST['dftaT'];
		$dureeTache = $_POST['dureeT'];
		$objTache = $_POST['objT'];
		$jhTache = $_POST['jhT'];
		$reqSqlAddTache = " INSERT INTO tache(nom, cout, date_debut_tot, date_debut_tard, date_fin_tot, date_fin_tard, duree, objectif, journee_homme, id_phase, id_sousprojet)
							VALUES ('$nameTache', '$coutTache', '$ddtoTache', '$ddtaTache', '$dftoTache', '$dftaTache', '$dureeTache', '$objTache', '$jhTache', '$idPhase', '$idSousProj')";
		mysql_query($reqSqlAddTache) or die ('Erreur SQL !'.$reqSqlAddTache.'<br />'.mysql_error());
		
		$reqCoutPhase = " UPDATE phase SET charge = charge + '$coutTache' 
						WHERE id_phase ='$idPhase'";
		mysql_query($reqCoutPhase) or die ('Erreur SQL !'.$reqCoutPhase.'<br />'.mysql_error());
		
		
		
	}
?>
	<body>
		<div id="bloc_central">
			<form method="POST" action="resume.php">
				<?php echo "<label class=\"form-control\">".$nameTache." a bien &eacute;t&eacute; ajout&eacute; aux t&acirc;ches</label>";
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