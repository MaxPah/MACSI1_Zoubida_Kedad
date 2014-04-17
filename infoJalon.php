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
	
	
	
	<!-- INFOS SUR LE JALON -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<?php $idJ = $_GET['idJ'];
					
				$sqlJalon = 'SELECT nom
								FROM jalon
								WHERE id_jalon ="'.$idJ.'"';
				
				$reqJalon = mysql_query($sqlJalon) or die('Erreur requete : '.mysql_error());
				$resJalon = mysql_fetch_array($reqJalon) or die('Erreur result : '.mysql_error());
				$nomJ = $resJalon['nom'];
				
				echo "<strong>".$nomJ."</strong>";
			?>
		</div>
		<ul class="list-group">
		<?php
			$sqlJ = 'SELECT date,evenement
						 FROM jalon
						 WHERE id_jalon ="'.$idJ.'"';
			$reqJ = mysql_query($sqlJ) or die('Erreur requete 2 : '.mysql_error());
			while($resJ = mysql_fetch_array($reqJ))					
			{
				echo "<li class=\"list-group-item\"> <u><strong><i>date </i></strong></u> : ".$resJ['date']."</li>";
				echo "<li class=\"list-group-item\"> <u><strong><i>Evenement </i></strong></u> : ".$resJ['evenement']."</li>";
			}
		?>
		</ul>
	</div>
	</body>

</html>