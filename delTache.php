<!DOCTYPE html>
<?php 
	include("connexion.php");
?>
<html lang="fr">

	<head>
			<title>Suppression d'une tache</title>
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
	
	if(isset($_POST['nameT'])) {
		$nameT=$_POST['nameT'];
		
		$sqlIdPh = ' SELECT id_phase,cout 
					  FROM tache
					  WHERE nom = "'.$nameT.'"';
		$reqIdPh=mysql_query($sqlIdPh);
		$resIdPh = mysql_fetch_array($reqIdPh);
		$idPh = $resIdPh['id_phase'];
		$coutPh = $resIdPh['cout'];
		
			$reqCoutPhase = " UPDATE phase SET charge = charge - '$coutPh' 
						WHERE id_phase ='$idPh'";
		mysql_query($reqCoutPhase) or die ('Erreur SQL !'.$reqCoutPhase.'<br />'.mysql_error());
		
		$SqlDelT = ' DELETE FROM tache 
					 WHERE nom ="'.$nameT.'" 
					 AND id_phase ="'.$idPh.'"';
		mysql_query($SqlDelT) or die ('Erreur SQL !'.$SqlDelT.'<br />'.mysql_error());
	}
?>
	<body>
		<div id="bloc_central">
			<form method="POST" action="resume.php">
				<?php echo "<label class=\"form-control\">".$nameT." a bien &eacute;t&eacute; supprim&eacute; des taches</label>";
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