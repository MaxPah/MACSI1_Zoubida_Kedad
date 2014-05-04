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
	
		
	<!-- /************************ APRES AVOIR AFFECTE UNE RESSOURCE A UNE TACHE *****************************-->
		<?php 
		if(isset($_POST['ajout_ress'])) {
		$nameR = $_POST['nameR'];
				$sqlR = 'SELECT id_ressource as idress 
						FROM ressource 
					   WHERE nom="'.$nameR.'"';
				$reqR = mysql_query($sqlR) or die('Erreur requete -1 : '.mysql_error());
				$resR = mysql_fetch_array($reqR) or die('Erreur result -1 : '.mysql_error());
				
		$nameT=$_POST['nameT'];
				$sqlT = 'SELECT id_tache as idT 
						FROM tache 
					   WHERE nom="'.$nameT.'"';
				$reqT = mysql_query($sqlT) or die('Erreur requete -2 : '.mysql_error());
				$resT = mysql_fetch_array($reqT) or die('Erreur result -2 : '.mysql_error());
				
		$duree = $_POST['duree'];
		$taux = $_POST['taux'];
		$idress= $resR['idress'];
		$idTache = $resT['idT'];
		$reqSql = 'INSERT INTO tacheressource(id_tache,id_ressource,duree,taux_affectation,id_projet) VALUES ("'.$idTache.'","'.$idress.'","'.$duree.'", "'.$taux.'","'.$_SESSION['idProject'].'")';
		mysql_query($reqSql) or die ('Erreur Insertion : '.mysql_error());
		}
		?>
	<!-- /*****************************************************-->
	
	
	<!-- INFOS SUR LES RESSOURCES -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<?php 
				echo "<strong>Ressources</strong>";
			?>
		</div>
		<ul class="list-group">
		<?php /**  Ressources Humaines **/ 
			$sqlR = 'SELECT nom,id_ressource, cout, qualification
					 FROM ressource
					 WHERE type="humaine"';
			$reqR = mysql_query($sqlR) or die('Erreur requete 2 : '.mysql_error());
			echo "<li class=\"list-group-item\"> <u><strong><i>Humaines</i></strong></u> : ";
			while($resR = mysql_fetch_array($reqR))	{	
			echo "<li class=\"list-group-item\">
					  <span class=\"badge\">Cout : ".$resR['cout']."</span>
					   <u>Nom</u> : ".$resR['nom']."
					  <br/>
					  <u>Qualification</u> : ".$resR['qualification']."
					   <br/>
					   <u>Affectations</u> : ";
				$sqlRT = '	SELECT nom, t.id_tache as idT
					 		FROM tache t, tacheressource tr
					 		WHERE tr.id_ressource = "'.$resR['id_ressource'].'"
					 		AND tr.id_tache = t.id_tache';
				$reqRT = mysql_query($sqlRT) or die('Erreur requete 2 : '.mysql_error());
				while($resRT = mysql_fetch_array($reqRT))
					echo "<a href=\"infoTache.php?idT=".$resRT['idT']."\">".$resRT['nom']."</a>, ";
				echo "</li>";
			}
			echo "</li>";
		?>
		</ul>
		<ul class="list-group">
		<?php /**  Ressources Materielles **/ 
			$sqlR = 'SELECT nom,id_ressource, cout, qualification
					 FROM ressource
					 WHERE type="materielle"';
			$reqR = mysql_query($sqlR) or die('Erreur requete 2 : '.mysql_error());
			echo "<li class=\"list-group-item\"> <u><strong><i>Materielles</i></strong></u> : ";
			while($resR = mysql_fetch_array($reqR))	{	
			echo "<li class=\"list-group-item\">
					  <span class=\"badge\">Cout : ".$resR['cout']."</span>
					   <u>Nom</u> : ".$resR['nom']."
					  <br/>
					  <u>Qualification</u> : ".$resR['qualification']."
					   <br/>
					   <u>Affectations</u> : ";
				$sqlRT = '	SELECT nom, t.id_tache as idT
					 		FROM tache t, tacheressource tr
					 		WHERE tr.id_ressource = "'.$resR['id_ressource'].'"
					 		AND tr.id_tache = t.id_tache';
				$reqRT = mysql_query($sqlRT) or die('Erreur requete 2 : '.mysql_error());
				while($resRT = mysql_fetch_array($reqRT))
					echo "<a href=\"infoTache.php?idT=".$resRT['idT']."\">".$resRT['nom']."</a>, ";
				echo "</li>";
			}
			echo "</li>";
		?>
		</ul>
		<ul class="list-group">
		<?php /**  Ressources Logicielles **/ 
			$sqlR = 'SELECT nom,id_ressource, cout, qualification
					 FROM ressource
					 WHERE type="logicielle"';
			$reqR = mysql_query($sqlR) or die('Erreur requete 2 : '.mysql_error());
			echo "<li class=\"list-group-item\"> <u><strong><i>Logicielles</i></strong></u> : ";
			while($resR = mysql_fetch_array($reqR))	{	
			echo "<li class=\"list-group-item\">
					  <span class=\"badge\">Cout : ".$resR['cout']."</span>
					   <u>Nom</u> : ".$resR['nom']."
					  <br/>
					  <u>Qualification</u> : ".$resR['qualification']."
					   <br/>
					   <u>Affectations</u> : ";
				$sqlRT = '	SELECT nom, t.id_tache as idT
					 		FROM tache t, tacheressource tr
					 		WHERE tr.id_ressource = "'.$resR['id_ressource'].'"
					 		AND tr.id_tache = t.id_tache';
				$reqRT = mysql_query($sqlRT) or die('Erreur requete 2 : '.mysql_error());
				while($resRT = mysql_fetch_array($reqRT))
					echo "<a href=\"infoTache.php?idT=".$resRT['idT']."\">".$resRT['nom']."</a>, ";
				echo "</li>";
			}
			echo "</li>";
		?>
		</ul>
		<br/>
	</div>
	<!-- SECOND BLOC -->
	<!-- RESSOURCES AFFECT�ES A LA TACHE -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<?php 	
				echo "<strong> Affecter une ressource &agrave; une tache </strong>";
			?>
		</div>
		<ul class="list-group">

		<li class="list-group-item"><strong>Selectionner la tache cible</strong>
			<?php
			echo "<form method=\"POST\" action=\"infoRess.php\">";
			$sqlT = 'SELECT t.nom,t.id_tache
					 FROM tache t, sousprojet sp, lot l
					 WHERE l.id_projet ="'.$_SESSION['idProject'].'"
					 AND t.id_sousprojet = sp.id_sousprojet
					 AND sp.id_lot = l.id_lot';
			$reqT = mysql_query($sqlT) or die('Erreur requete 2 : '.mysql_error());
			echo "<select class=\"form-control\" name=\"nameT\">";
				while($resT = mysql_fetch_array($reqT))
				{
					echo "<option>".$resT['nom']."</option>";
				}
				echo "</select>";
			?>
			<strong>Selectionner la ressource &agrave; affecter</strong>
			<?php
				$sqlR = 'SELECT nom
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
			<button class="btn btn-primary btn-sm" name="ajout_ress" type="submit">Affecter <span class="glyphicon glyphicon-plus"></span></button>				
			<br/><br/>
		</form>
			
		</li>
		</ul>
	</div>
	
	</body>

</html>