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
	
	<?php $nameProject = $_SESSION['nameP']; include ('navigation.php');?>
		
	<?php include ('includesNavBar.php'); ?>
	
	
	
	<!-- INFOS SUR LE LOT -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<?php 
				echo "<strong>Ressource</strong>";
			?>
		</div>
		<ul class="list-group">
		<?php /**  Ressources Materielle**/ 
			$sqlR = 'SELECT nom,id_ressource
					 FROM ressource
					 WHERE type="materielle"';
			$reqR = mysql_query($sqlR) or die('Erreur requete 2 : '.mysql_error());
			echo "<li class=\"list-group-item\"> <u><strong><i>Materielle </i></strong></u> : ";
			while($resR = mysql_fetch_array($reqR))					
			echo "  <a href=\"infoRess.php?idSP=".$resR['id_ressource']."\">".$resR['nom'].", </a>";
			echo "</li>";
		?>
		</ul>
		<ul class="list-group">
		<?php /**  Ressources Humaine**/ 
			$sqlR = 'SELECT nom,id_ressource
					 FROM ressource
					 WHERE type="humaine"';
			$reqR = mysql_query($sqlR) or die('Erreur requete 2 : '.mysql_error());
			echo "<li class=\"list-group-item\"> <u><strong><i>Humaine </i></strong></u> : ";
			while($resR = mysql_fetch_array($reqR))					
			echo "  <a href=\"infoRess.php?idSP=".$resR['id_ressource']."\">".$resR['nom'].", </a>";
			echo "</li>";
		?>
		</ul>
		<ul class="list-group">
		<?php /**  Ressources Logicielle**/ 
			$sqlR = 'SELECT nom,id_ressource
					 FROM ressource
					 WHERE type="logicielle"';
			$reqR = mysql_query($sqlR) or die('Erreur requete 2 : '.mysql_error());
			echo "<li class=\"list-group-item\"> <u><strong><i>Logicielle </i></strong></u> : ";
			while($resR = mysql_fetch_array($reqR))					
			echo "  <a href=\"infoRess.php?idSP=".$resR['id_ressource']."\">".$resR['nom'].", </a>";
			echo "</li>";
		?>
		</ul>
		<br/>
	</div>
	<!-- SECOND BLOC -->
	<!-- RESSOURCES AFFECTÉES A LA TACHE -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<?php 	
				echo "<strong> Affecter une ressource &agrave; une tache </strong>";
			?>
		</div>
		<ul class="list-group">

		<li class="list-group-item"><strong>Selectionner la tache cible</strong>
			<?php
			echo" <form method=\"POST\" name =\"idT\"action=\"infoRess.php?idR=".$resR['id_ressource']."\">";
				$sqlT = 'SELECT t.nom,t.id_tache
					 FROM tache t, sousprojet sp, lot l
					 WHERE l.id_projet ="'.$_SESSION['idProject'].'"
					 AND t.id_sousprojet = sp.id_sousprojet
					 AND sp.id_lot = l.id_lot';
			$reqT = mysql_query($sqlT) or die('Erreur requete 2 : '.mysql_error());
			echo "<select class=\"form-control\" name=\"nameR\">";
				while($resT = mysql_fetch_array($reqT))
				{
					echo "<option>".$resT['nom']."</option>";
				}
				echo "</select>";
			?>
			<strong>Selectionner la ressource &agrave; affecter</strong>
			<?php
			echo" <form method=\"POST\" name =\"idR\"action=\"infoRess.php?idR=".$resR['id_ressource']."\">";
				$sqlR = 'SELECT nom,id_ressource
					 FROM ressource';
			$reqR = mysql_query($sqlR) or die('Erreur requete 2 : '.mysql_error());
			echo "<select class=\"form-control\" name=\"nameR\">";
				while($resR = mysql_fetch_array($reqR))
				{
					echo "<option>".$resR['nom']."</option>";
				}
				echo "</select>";
			?>
			<br/>
			<input type="text" placeholder="Duree" size="10" name="duree">
			<input type="text" placeholder="Taux d'affectation" size="15" name="taux">			
			<input type="hidden" name="idtache" value="<?php echo $idTache;?>">			
			<button class="btn btn-primary btn-sm" name="ajout_ress" type="submit"><span class="glyphicon glyphicon-plus"></span></button>				
			<br/><br/>
		</form>
			
		</li>
		</ul>
	</div>
	
	
	
	
	
	
	
	
	
	</body>

</html>