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
<?php $idP = $_GET['idP']; /* LOT PHASE JALON */ 
					
				$sqlP = ' SELECT nom
							FROM projet
							WHERE id_projet ="'.$idP.'"';
				
				$reqP = mysql_query($sqlP) or die('Erreur requete : '.mysql_error());
				$resP = mysql_fetch_array($reqP) or die('Erreur result : '.mysql_error());
				$nameProject = $resP['nom'];
				$nomP = $nameProject;
				
	 include ('navigation.php');?>
		
	<?php include ('includesNavBar.php'); ?>
	
	
	
	<!-- INFOS SUR LE LOT -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<?php
				echo "<strong>Infos de ".$nameProject."</strong>";
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
				echo "<li class=\"list-group-item\"> <u><strong><i>Enveloppe budg&eacute;taire pr&eacute;visionnelle</i></strong></u> : ".$resp['enveloppe_budg']."</li>";
				echo "<li class=\"list-group-item\"> <u><strong><i>D&eacute;scription </i></strong></u> : ".$resp['description']."</li>";
				echo "<li class=\"list-group-item\"> <u><strong><i>Date de fin pr&eacute;visionnelle </i></strong></u> : ".$resp['datefin']."</li>";
			}
		?>
		<?php
			$sqlp = 'SELECT datefin,datedeb
						 FROM projet
						 WHERE id_projet ="'.$idP.'"';
				$reqp = mysql_query($sqlp) or die('Erreur requete 2 : '.mysql_error());
				while($resp = mysql_fetch_array($reqp))					
					{
					$datefin = $resp['datefin'];
					$datedeb = $resp['datedeb'];
					}
				$datejour =date('Y-m-d');
				
				$sqlp2 = 'SELECT DATEDIFF(\''.$datefin.'\',\''.$datedeb.'\') as deb';
				$reqp2 = mysql_query($sqlp2) or die('Erreur requete 2 : '.mysql_error());
				while($resp2 = mysql_fetch_array($reqp2))					
					$a = $resp2['deb'];
					
				$sqlp = 'SELECT DATEDIFF(\''.$datefin.'\',\''.$datejour.'\') as this';
				$reqp = mysql_query($sqlp) or die('Erreur requete 2 : '.mysql_error());
				while($resp = mysql_fetch_array($reqp))					
				{
					$moy = 100 - $resp['this']*100 / $a ;
					$moy =number_format($moy);
					echo "<li class=\"list-group-item\"> <u><strong><i>Fin du projet dans  </i></strong></u> : ".$resp['this']."  jours (approx)</li>";
					echo "<li class=\"list-group-item\"> <u><strong><i>Projet effectu&eacute; &agrave;  </i></strong></u> : ".$moy." % (approx)</li>";
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
				echo "<a href=\"infoLot.php?idL=".$resp['id_lot']."&nameP=".$nomP."\">".$resp['nom']."</a> , ";
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
				echo "<a href=\"infoPhase.php?idP=".$resp['id_phase']."&nameP=".$nomP."\">".$resp['nom']."</a> , ";
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
				echo "<a href=\"infoJalon.php?idJ=".$resp['id_jalon']."&nameP=".$nomP."\">".$resp['nom']."</a> , ";
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
					 AND t.date_fin_tard < CURDATE()';
			$reqp = mysql_query($sqlp) or die('Erreur requete 2 : '.mysql_error());
			
			echo "<li class=\"list-group-item\"> <u><strong><i>Taches &eacute;ffectu&eacute;es </i></strong></u> : ";
			while($resp = mysql_fetch_array($reqp))					
			{	$tachefaites++;
				echo "<a href=\"infoTache.php?idT=".$resp['id_tache']."&nameP=".$nomP."\">".$resp['nom']."</a> , ";
			}
			echo "</li>";
		?>
		<?php
		/* Taches à faire */
		
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
				echo "<a href=\"infoTache.php?idT=".$resp['id_tache']."&nameP=".$nomP."\">".$resp['nom']."</a> , ";
			}
			echo "</li>";
		?>
		<?php
		/* Taches Totales */
			$tachetotal = $tachefaites + $tacheafaire;
			echo "<li class=\"list-group-item\"> <u><strong><i>Taux taches </i></strong></u> : ";
			echo "Il y a ".$tachefaites." taches effectu&eacute;es sur ".$tachetotal." taches pr&eacute;vues. ";
			echo "</li>";
		?>		
		</ul>
		<br/>
	</div>
	</body>

</html>