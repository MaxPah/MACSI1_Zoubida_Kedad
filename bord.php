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
<?php 
	$idP = $_SESSION['idProject']; 
	$nameProject = $_SESSION['nameP']; 
				
	include ('navigation.php');
	include ('includesNavBar.php'); 
	include ('cout.php');
	?>
	
	
	
	<!-- INFOS SUR LE LOT -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<?php
				echo "<strong>Infos de ".$_SESSION['nameP']."</strong>";
			?>
		</div>
		<ul class="list-group">
		<?php
		/* BASE */
		
		$sqlEnv = "SELECT SUM(charge) as env
				FROM phase
				WHERE id_projet=".$_SESSION['idProject'];
		$reqEnv = mysql_query($sqlEnv)or die('Erreur requete reqEnv : '.mysql_error());
		while($resEnv = mysql_fetch_array($reqEnv))
			$env = $resEnv['env'];
		
		
			$sqlp = 'SELECT *
					 FROM projet
					 WHERE id_projet ="'.$idP.'"';
			$reqp = mysql_query($sqlp) or die('Erreur requete 2 : '.mysql_error());
			while($resp = mysql_fetch_array($reqp))					
			{	$reste = $resp['enveloppe_budg'] - $env;
				echo "<li class=\"list-group-item\"> <u><strong><i>Enveloppe budg&eacute;taire</i></strong></u> : ".$env."€, (<strong><u><i>Pr&eacute;visionnel</i></u></strong> : ".$resp['enveloppe_budg']."€, <strong><u><i>Disponible</i></u></strong> : ".$reste."€) </li>";
				echo "<li class=\"list-group-item\"> <u><strong><i>Description </i></strong></u> : ".$resp['description']."</li>";
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
				echo "<a href='infoLot.php?idL=".$resp['id_lot']."'>".$resp['nom']."</a>, ";
			}
			echo "</li>";
		?>
		<?php
		/* Sous projets */
			$sqlp = 'SELECT s.nom, s.id_sousprojet
					 FROM sousprojet s, lot l
					 WHERE l.id_projet ="'.$idP.'"
					 AND s.id_lot = l.id_lot';
			$reqp = mysql_query($sqlp) or die('Erreur requete 2 : '.mysql_error());
			
			echo "<li class=\"list-group-item\"> <u><strong><i>Sous-projets </i></strong></u> : ";
			while($resp = mysql_fetch_array($reqp))					
			{
				echo "<a href='infoSousProjet.php?idSP=".$resp['id_sousprojet']."'>".$resp['nom']."</a>, ";
			}
			echo "</li>";
		?>
		
		<?php
		/* Phase */
						$sqlp = 'SELECT nom,id_phase
					 FROM phase
					 WHERE id_projet ="'.$idP.'"';
			$reqp = mysql_query($sqlp) or die('Erreur requete 2 : '.mysql_error());
			
			echo "<li class=\"list-group-item\"> <u><strong><i>Phases </i></strong></u> : ";
			while($resp = mysql_fetch_array($reqp))					
			{
				echo "<a href='infoPhase.php?idP=".$resp['id_phase']."'>".$resp['nom']."</a>, ";
			}
			echo "</li>";
		?>
		
		<?php
		/* Jalon */
						$sqlp = 'SELECT nom,id_jalon
					 FROM jalon
					 WHERE id_projet ="'.$idP.'"';
			$reqp = mysql_query($sqlp) or die('Erreur requete 2 : '.mysql_error());
			
			echo "<li class=\"list-group-item\"> <u><strong><i>Jalons </i></strong></u> : ";
			while($resp = mysql_fetch_array($reqp))					
			{
				echo "<a href='infoJalon.php?idJ=".$resp['id_jalon']."'>".$resp['nom']."</a>, ";
			}
			echo "</li>";
		?>
		<?php
		/* Taches effectuees */
		
		$tachefaites=0;
						$sqlp = 'SELECT t.nom,t.id_tache
					 FROM tache t, sousprojet sp, lot l
					 WHERE l.id_projet ="'.$idP.'"
					 AND t.id_sousprojet = sp.id_sousprojet
					 AND sp.id_lot = l.id_lot
					 AND t.date_fin_tard <= CURDATE()';
			$reqp = mysql_query($sqlp) or die('Erreur requete 2 : '.mysql_error());
			
			echo "<li class=\"list-group-item\"> <u><strong><i>Taches effectu&eacute;es </i></strong></u> : ";
			while($resp = mysql_fetch_array($reqp))					
			{	$tachefaites++;
				echo "<a href='infoTache.php?idT=".$resp['id_tache']."'>".$resp['nom']."</a>, ";
			}
			echo "</li>";
		?>
		<?php
		/* Taches � faire */
		
		$tacheafaire=0;
						$sqlp = 'SELECT t.nom,t.id_tache
					 FROM tache t, sousprojet sp, lot l
					 WHERE l.id_projet ="'.$idP.'"
					 AND t.id_sousprojet = sp.id_sousprojet
					 AND sp.id_lot = l.id_lot
					 AND t.date_fin_tard > CURDATE()';
			$reqp = mysql_query($sqlp) or die('Erreur requete 2 : '.mysql_error());
			
			echo "<li class=\"list-group-item\"> <u><strong><i>Taches planifi&eacute;es </i></strong></u> : ";
			while($resp = mysql_fetch_array($reqp))					
			{	$tacheafaire++;
				echo "<a href='infoTache.php?idT=".$resp['id_tache']."'>".$resp['nom']."</a>, ";
			}
			echo "</li>";
		?>
		<?php
		/* Taches Totales */
			$tachetotal = $tachefaites + $tacheafaire;
			if ($tachetotal == 0)
				$moy = 0;
			else $moy = $tachefaites / $tachetotal * 100 ;
			
			$moy =number_format($moy);
			echo "<li class=\"list-group-item\"> <u><strong><i>Taux taches </i></strong></u> : ";
				echo "Il y a ".$tachefaites." taches effectu&eacute;es sur ".$tachetotal." taches pr&eacute;vues. <br/><br/>  ";
				echo "<div class='progress progress-striped active'>
					<div class='progress-bar' role='progressbar' aria-valuenow='".$moy."' aria-valuemin='0' aria-valuemax='100' style='width: ".$moy."%;'>
						Projet effectu&eacute; &agrave; ".$moy."% 
					</div>
				</div>";
			echo "</li>";
		?>
		<?php
		/* Ressources utilisées */
				$sqlp = 'SELECT tr.taux_affectation,r.nom
			FROM tacheressource tr, ressource r
			WHERE id_projet ="'.$idP.'"
			AND r.id_ressource = tr.id_ressource
			';
			$reqp = mysql_query($sqlp) or die('Erreur requete 2 : '.mysql_error());
			echo "<li class=\"list-group-item\"> <u><strong><i>Ressources utilis&eacute;es </i></strong></u> : ";
			while($resp = mysql_fetch_array($reqp))					
				echo $resp['nom']." ".$resp['taux_affectation']."%  <span class='glyphicon glyphicon-minus'></span>  ";
			echo "</li>";
		?>
		</ul>
		<br/>
	</div>
	</body>

</html>