<!DOCTYPE html>
<?php 
	include("connexion.php");
?>
<html lang="fr">

	<head>
			<title>Gestion de Projets</title>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

			<link rel="icon" type="image/x-icon" href="img/favicon.png"/>
			<link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen"/> 
			<link rel="stylesheet" href="gs.css" type="text/css" media="screen"/> 
			<script src="js/jquery-1.10.2.min.js"></script>
			<script src="js/bootstrap.min.js"></script>	
	</head>

	<body>
	
	<?php $nameProject = $_GET['nameP']; include ('navigation.php');?>
		
	<?php include ('includesNavBar.php'); ?>
	
	
	
	<!-- INFOS SUR LA PHASE -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<?php $idP = $_GET['idP'];
					
				$sqlPhase = 'SELECT nom
								FROM phase
								WHERE id_phase ="'.$idP.'"';
				
				$reqPhase = mysql_query($sqlPhase) or die('Erreur requete : '.mysql_error());
				$resPhase = mysql_fetch_array($reqPhase) or die('Erreur result : '.mysql_error());
				$nomP = $resPhase['nom'];
				
				echo "<strong>Tache de ".$nomP."</strong>";
			?>
		</div>
		<ul class="list-group">
		<?php
			$sqlSP = 'SELECT nom, id_tache
						 FROM tache
						 WHERE id_phase ="'.$idP.'"';
			$reqSP = mysql_query($sqlSP) or die('Erreur requete 2 : '.mysql_error());
			while($resSP = mysql_fetch_array($reqSP))					
			echo "<li class=\"list-group-item\"> <u><strong><i>Tache</i></strong></u> : <a href=\"infoTache.php?idT=".$resSP['id_tache']."&nameP=".$nameProject."\">".$resSP['nom']."</a></li>";
		?>
		</ul>
		<br/>
	</div><br/>
	<div class="panel panel-default">
		<div class="panel-heading">
			<?php echo "<strong>Jalons de ".$nomP."</strong>"; ?>
		</div>
		<ul class="list-group">
		<?php
			$sqlSP = 'SELECT *
						 FROM jalon
						 WHERE id_phase ="'.$idP.'"';
			$reqSP = mysql_query($sqlSP) or die('Erreur requete 2 : '.mysql_error());
			while($resSP = mysql_fetch_array($reqSP))					
			echo "<li class=\"list-group-item\"> <u><strong><i>Jalon</i></strong></u> : <a href=\"infoJalon.php?idJ=".$resSP['id_jalon']."&nameP=".$nameProject."\">".$resSP['nom']."</a></li>";
		?>
		</ul>
	</div>	
	</body>

</html>