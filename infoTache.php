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
	
	<?php 	$nameProject = $_GET['nameP']; include ('navigation.php');
			$sqlIdProject= "SELECT id_projet
							FROM projet
							WHERE nom = '$nameProject'";
			$reqIdProject=mysql_query($sqlIdProject);
			$idProjectArray= mysql_fetch_array($reqIdProject);
			$idProject=$idProjectArray['id_projet'];
	?>
		
	<?php include ('includesNavBar.php'); ?>
	
	
	<!-- /*****************************************************-->
		<?php 
		if(isset($_POST['youlo'])) {
		$nameR = $_POST['nameR'];
			$sql = 'SELECT id_ressource as idress 
								   FROM ressource 
								   WHERE nom="'.$nameR.'"';
					
				$req = mysql_query($sql) or die('Erreur requete : '.mysql_error());
				$result = mysql_fetch_array($req) or die('Erreur result : '.mysql_error());
		$idTache=$_POST['idtache'];
		$duree = $_POST['duree'];
		$taux = $_POST['taux'];
		$idress= $result['idress'];
		$reqSql = 'INSERT INTO tacheressource(id_tache,id_ressource,duree,taux_affectation,id_projet) VALUES ("'.$idTache.'","'.$idress.'","'.$duree.'", "'.$taux.'","'.$idProject.'")';
		mysql_query($reqSql) or die ('Erreur SQL'.mysql_error());
		}
		?>
		<!-- /*****************************************************-->
	
	
	
		
	<!-- INFOS SUR LA TACHE -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<?php $idTache = $_GET['idT'];
					
				$sqlNomTache = 'SELECT nom
								FROM tache
								WHERE id_tache ="'.$idTache.'"';
				
				$reqNomTache = mysql_query($sqlNomTache) or die('Erreur requete : '.mysql_error());
				$resNomTache = mysql_fetch_array($reqNomTache) or die('Erreur result : '.mysql_error());
				$nomTache = $resNomTache['nom'];
				
				echo "<strong>".$nomTache."</strong>";
			?>
		</div>
		<ul class="list-group">
		<?php

			$sqlTache = 'SELECT *
						 FROM tache
						 WHERE id_tache ="'.$idTache.'"';
			$reqTache = mysql_query($sqlTache) or die('Erreur requete 2 : '.mysql_error());
			$resTache = mysql_fetch_array($reqTache) or die('Erreur result 2 : '.mysql_error());

			$sqlNoms = 'SELECT s.nom as nomSP, p.nom as nomP
						FROM tache t,sousprojet s, phase p
						WHERE '.$resTache['id_sousprojet'].' = s.id_sousprojet
						AND '.$resTache['id_phase'].' = p.id_phase
						AND t.id_tache ="'.$idTache.'"';
					
			$reqNoms=mysql_query($sqlNoms) or die('Erreur query 3 : '.mysql_error());
			$resNoms= mysql_fetch_array($reqNoms) or die('Erreur result 3 : '.mysql_error());
		
			
			
			echo "<li class=\"list-group-item\"> <u><strong><i>Phase</i></strong></u> : <a href=\"infoPhase.php?idP=".$resTache['id_phase']."&nameP=".$nameProject."\">".$resNoms['nomP']."</a></li>";
			echo "<li class=\"list-group-item\"> <u><strong><i>Sous-projet</i></strong></u> : <a href=\"infoSousProjet.php?idSP=".$resTache['id_sousprojet']."&nameP=".$nameProject."\">".$resNoms['nomSP']."</a></li>";
			echo "<li class=\"list-group-item\"> <u><strong><i>Objectif</i></strong></u> : ".$resTache['objectif']."</li>";
			echo "<li class=\"list-group-item\"> <u><strong><i>Cout</i></strong></u> : ".$resTache['cout']."</li>";
			echo "<li class=\"list-group-item\"> <u><strong><i>D&eacute;but au plus t&ocirc;t</i></strong></u> : ".$resTache['date_debut_tot']."</li>";
			echo "<li class=\"list-group-item\"> <u><strong><i>D&eacute;but au plus tard</i></strong></u> : ".$resTache['date_debut_tard']."</li>";
			echo "<li class=\"list-group-item\"> <u><strong><i>Fin au plus t&ocirc;t</i></strong></u> : ".$resTache['date_fin_tot']."</li>";
			echo "<li class=\"list-group-item\"> <u><strong><i>Fin au plus tard</i></strong></u> : ".$resTache['date_fin_tard']."</li>";
			echo "<li class=\"list-group-item\"> <u><strong><i>Duree</i></strong></u> : ".$resTache['duree']."</li>";
			echo "<li class=\"list-group-item\"> <u><strong><i>Journ&eacute;es homme</i></strong></u> : ".$resTache['journee_homme']."</li>";
			if($resTache['id_livrable'] != NULL) {
				$sqlLivrable = 'SELECT nom
								FROM livrable
								WHERE id_livrable = "'.$resTache['id_livrable'].'"';
				$reqLivrable=mysql_query($sqlLivrable) or die('Erreur query 4 : '.mysql_error());
				$resLivrable= mysql_fetch_array($reqLivrable) or die('Erreur result 4 : '.mysql_error());
		
				echo "<li class=\"list-group-item\"> <u><strong><i>Livrable</i></strong></u> : <a href=\"infoLivrable.php?idL=".$resTache['id_livrable']."&nameP=".$nameProject."\">".$resLivrable['nom']."</a></li>";
			}
		?>
		</ul>
	</div>
	
	<!-- RESSOURCES AFFECTÉES A LA TACHE -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<?php $idTache = $_GET['idT'];
					
				$sqlNomTache = 'SELECT nom
								FROM tache
								WHERE id_tache ="'.$idTache.'"';
				
				$reqNomTache = mysql_query($sqlNomTache) or die('Erreur requete 1.2: '.mysql_error());
				$resNomTache = mysql_fetch_array($reqNomTache) or die('Erreur result 1.2: '.mysql_error());
				$nomTache = $resNomTache['nom'];
				
				echo "<strong> RESSOURCES DE ".$nomTache."</strong>";
			?>
		</div>
		<ul class="list-group">

		<li class="list-group-item">
		<strong>Affecter une nouvelle ressource &agrave; cette t&acirc;che :  </strong>
		<br/><br/>
			<?php
			echo" <form method=\"POST\" action=\"infoTache.php?idT=".$idTache."&nameP=".$nameProject."\">";
		
				$sqlNameRess = "SELECT nom,id_ressource as idress 
								   FROM ressource";
				$reqNameRess = mysql_query($sqlNameRess);
				echo "<select class=\"form-control\" name=\"nameR\">";
				while($resultNameRess = mysql_fetch_array($reqNameRess))
				{
					echo "<option>".$resultNameRess['nom']."</option>";
				}
				echo "</select>";
			?>
			<br/>
			<input type="text" placeholder="Duree" size="10" name="duree">
			<input type="text" placeholder="Taux d'affectation" size="15" name="taux">			
			<input type="hidden" name="idtache" value="<?php echo $idTache;?>">			
			<button class="btn btn-primary btn-sm" name="youlo" type="submit"><span class="glyphicon glyphicon-plus"></span>Affecter cette ressource</button>				
			<br/><br/>
		</form>
			
		</li>
			<?php 
			$sqlTR = 'SELECT r.nom, r.cout, r.qualification, tr.taux_affectation as ta, tr.duree, r.type
					  FROM ressource r, tacheressource tr
					  WHERE tr.id_tache ="'.$idTache.'"
					  AND r.id_ressource = tr.id_ressource';
					  
			$reqTR = mysql_query($sqlTR) or die('Erreur requete 2 : '.mysql_error());
			while($resTR = mysql_fetch_array($reqTR)) 
			{
				echo "<li class=\"list-group-item\">
					  <span class=\"badge\">Type : ".$resTR['type']."</span>
					  <span class=\"badge\">Cout : ".$resTR['cout']."</span>
					  <span class=\"badge\">Duree : ".$resTR['duree']."</span>
					  <span class=\"badge\">Taux d'affectation : ".$resTR['ta']."</span>
					  <u><strong><i>Nom</i></strong></u> : ".$resTR['nom']."
					  <br/>
					  <u><strong><i>Qualification</i></strong></u> : ".$resTR['qualification']."
					  </li>";
			}
		?>
		</ul>
	</div>
			
		
	</body>

</html>