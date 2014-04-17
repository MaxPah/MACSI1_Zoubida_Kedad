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
			<?php $idL = $_GET['idL'];
					
				$sqlLot = 'SELECT nom
								FROM lot
								WHERE id_lot ="'.$idL.'"';
				
				$reqLot = mysql_query($sqlLot) or die('Erreur requete : '.mysql_error());
				$resLot = mysql_fetch_array($reqLot) or die('Erreur result : '.mysql_error());
				$nomL = $resLot['nom'];
				
				echo "<strong>Sous Projet de ".$nomL."</strong>";
			?>
		</div>
		<ul class="list-group">
		<?php
			$sqlL = 'SELECT *
						 FROM sousprojet
						 WHERE id_lot ="'.$idL.'"';
			$reqL = mysql_query($sqlL) or die('Erreur requete 2 : '.mysql_error());
			while($resL = mysql_fetch_array($reqL))					
			echo "<li class=\"list-group-item\"> <u><strong><i>Sous Projet </i></strong></u> : ".$resL['nom']."</li>";
		?>
		</ul>
		<br/>
	</div>
	</body>

</html>