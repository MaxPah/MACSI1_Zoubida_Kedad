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
	
	if(isset($_POST['idT'])) {
		$valLot=explode('-',$_POST['idT']);
		
		$sqlIdPh = ' SELECT id_phase,cout 
					  FROM tache
					  WHERE id_tache = "'.$valLot[1].'"';
		$reqIdPh=mysql_query($sqlIdPh);
		$resIdPh = mysql_fetch_array($reqIdPh);
		$idPh = $resIdPh['id_phase'];
		$coutPh = $resIdPh['cout'];
		
			$reqCoutPhase = " UPDATE phase SET charge = charge - '$coutPh' 
						WHERE id_phase ='$idPh'";
		mysql_query($reqCoutPhase) or die ('Erreur SQL !'.$reqCoutPhase.'<br />'.mysql_error());
		
		$SqlDelT = ' DELETE FROM tache 
					 WHERE id_tache ="'.$valLot[1].'" 
					 AND id_phase ="'.$idPh.'"';
		mysql_query($SqlDelT) or die ('Erreur SQL !'.$SqlDelT.'<br />'.mysql_error());
	}
?>
	<body>
		<div id="bloc_central">
			<form method="POST" action="resume.php">
				<?php echo "<label class=\"form-control\">".$valLot[0]." a bien &eacute;t&eacute; supprim&eacute; des taches</label>";
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