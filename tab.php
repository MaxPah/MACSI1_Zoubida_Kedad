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
	
	<?php $nameProject = "MACSI 3"; include ('navigation.php');?>
		
	<?php include ('includesNavBar.php'); ?>
	
	
	
	<!-- INFOS SUR LE LOT -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<?php $idP = 9; /* LOT PHASE JALON */ 
					
				$sqlP = ' SELECT nom
							FROM projet
							WHERE id_projet ="'.$idP.'"';
				
				$reqP = mysql_query($sqlP) or die('Erreur requete : '.mysql_error());
				$resP = mysql_fetch_array($reqP) or die('Erreur result : '.mysql_error());
				$nomP = $resP['nom'];
				
				echo "<strong>Infos de ".$nomP."</strong>";
			?>
		</div>
		<ul class="list-group">
		<?php
		/* BASE */
			$sqlp = 'SELECT *
					 FROM projet
					 WHERE id_projet ="'.$idP.'"';
			$reqp = mysql_query($sqlp) or die('Erreur requete 2 : '.mysql_error());
			while($resp = mysql_fetch_array($reqp))					
			{
				echo "<li class=\"list-group-item\"> <u><strong><i>Enveloppe budg&eacute;taire </i></strong></u> : ".$resp['enveloppe_budg']."</li>";
				echo "<li class=\"list-group-item\"> <u><strong><i>D&eacute;scription </i></strong></u> : ".$resp['description']."</li>";
				echo "<li class=\"list-group-item\"> <u><strong><i>Date de fin pr&eacute;visionnelle </i></strong></u> : ".$resp['datefin']."</li>";
			}
		?>
		
		<?php
		/* LOT */
			$sqlp = 'SELECT *
					 FROM lot
					 WHERE id_projet ="'.$idP.'"';
			$reqp = mysql_query($sqlp) or die('Erreur requete 2 : '.mysql_error());
			
			echo "<li class=\"list-group-item\"> <u><strong><i>Lot </i></strong></u> : ";
			while($resp = mysql_fetch_array($reqp))					
			{
				echo "<a href=\"infoLot.php?idL=".$reqp['id_lot']."&nameP=".$nomP."\">".$resp['nom']."</a> , ";
			}
			echo "</li>";
		?>
		
		<?php
		/* Phase */
						$sqlp = 'SELECT nom,id_phase
					 FROM phase
					 WHERE id_projet ="'.$idP.'"';
			$reqp = mysql_query($sqlp) or die('Erreur requete 2 : '.mysql_error());
			
			echo "<li class=\"list-group-item\"> <u><strong><i>Phase </i></strong></u> : ";
			while($resp = mysql_fetch_array($reqp))					
			{
				echo "<a href=\"infoPhase.php?idP=".$reqp['id_phase']."&nameP=".$nomP."\">".$resp['nom']."</a> , ";
			}
			echo "</li>";
		?>
		
		<?php
		/* Jalon */
						$sqlp = 'SELECT nom,id_jalon
					 FROM jalon
					 WHERE id_projet ="'.$idP.'"';
			$reqp = mysql_query($sqlp) or die('Erreur requete 2 : '.mysql_error());
			
			echo "<li class=\"list-group-item\"> <u><strong><i>Jalon </i></strong></u> : ";
			while($resp = mysql_fetch_array($reqp))					
			{
				echo "<a href=\"infoJalon.php?idJ=".$reqp['id_jalon']."&nameP=".$nomP."\">".$resp['nom']."</a> , ";
			}
			echo "</li>";
		?>
		
		</ul>
		<br/>
	</div>
	</body>

</html>