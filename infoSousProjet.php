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
	
	
	
	<!-- INFOS SUR LA TACHE -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<?php $idSP = $_GET['idSP'];
					
				$sqlSousProjet = 'SELECT nom
								FROM sousprojet
								WHERE id_sousprojet ="'.$idSP.'"';
				
				$reqSousProjet = mysql_query($sqlSousProjet) or die('Erreur requete : '.mysql_error());
				$resSousProjet = mysql_fetch_array($reqSousProjet) or die('Erreur result : '.mysql_error());
				$nomSP = $resSousProjet['nom'];
				
				echo "<strong>Tache de ".$nomSP."</strong>";
			?>
		</div>
		<ul class="list-group">
		<?php
			$sqlSP = 'SELECT *
						 FROM tache
						 WHERE id_sousprojet ="'.$idSP.'"';
			$reqSP = mysql_query($sqlSP) or die('Erreur requete 2 : '.mysql_error());
			while($resSP = mysql_fetch_array($reqSP))					
			echo "<li class=\"list-group-item\"> <u><strong><i>Tache</i></strong></u> : ".$resSP['nom']."</li>";
		?>
		</ul>
	</div>	
	</body>

</html>