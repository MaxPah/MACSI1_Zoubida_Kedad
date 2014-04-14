<?php 
		session_start(); 
		$dbconn = mysql_connect("localhost", "root", "");
		$db = mysql_select_db("macsi1", $dbconn);
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
        <title><?php $nameProject = $_POST['nameP'];
					echo $nameProject; 
				?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="description" content=""/>
		<meta name="keywords" content=""/>
        <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen"/>
        <link rel="stylesheet" href="gs.css" type="text/css" media="screen"/>
		<script src="js/jquery-1.10.2.min.js"></script>
	<script src="js/bootstrap.min.js"></script>		
	
		
		<link rel="icon" type="image/png" href="favicon.png" />
		<!--[if lte IE 8]>
			<script src="js/html5.js" type="text/javascript"></script>
		<![endif]-->
</head>
   	<body>
		<?php
			/*** Création d'un nouveau projet ***/
			if(isset($_POST['new'])) {
				/*$nameProject = $_POST['nameP'];*/
				$reqSqlAddProject = 'INSERT INTO projet(nom,enveloppe_budg) VALUES ("'.$nameProject.'", 0)';
				mysql_query($reqSqlAddProject) or die ('Erreur SQL !'.$reqSqlAddProject.'<br />'.mysql_error());
			}
			/***Création nouveu projet ***/
			/*else if(isset($_POST['old'])) {
				$nameProject = $_POST['nameP'];
			}*/
		?>
		<!-- BARRE DE NAVIGATION-->
		
		<?php $nameProject = $_POST['nameP']; include ('navigation.php');?>
		<!--/. BARRE DE NAVIGATION-->
		<br/>
		<br/>
		<!--  A inclure en fin de fichier -->
		<!-- Ajouts -->
		
		
		<!-- Ajouter lot -->
		<?php include ('modalAddLot.php'); ?>
		<!--/. Ajouter lot -->
		
		<!-- Ajouter phase -->
		<?php include ('modalAddPhase.php'); ?>
		<!--/. Ajouter phase -->
		
		<!-- Ajouter sous-projet -->
		<?php include ('modalAddSousProjet.php'); ?>
		<!--/. Ajouter sous-projet -->
		
		<!-- Ajouter sous-projet -->
		<?php include ('modalAddTache.php'); ?>
		<!--/. Ajouter sous-projet -->
	
		<!--Suppression -->
		
		<!-- Supprimer lot -->
		<?php include ('modalDelLot.php'); ?>
		<!--/. Supprimer lot -->
		
		<!-- Supprimer phase -->
		<?php include ('modalDelPhase.php'); ?>
		<!--/. Supprimer phase -->
		
		<?php include ('test_bord.php'); ?>	
		
		<!-- Liste Tache -->
		<?php include ('listtache.php'); ?>
		<!--/. Liste Tache -->
		
		
		<!-- Supprimer projet -->
		<span class="supprProj">
			<a data-toggle="modal" href="#ValidSupprProjet" ><button class="btn btn-danger btn-xs" name="del" type="submit"><span class="glyphicon glyphicon-trash"></span>    Supprimer ce projet</button></a>
		</span>
		<?php	include('modalValidSupprProjet.php')	?>
		<!--/. Supprimer projet -->
		
		<!-- Retour accueil -->
		<span class="retourIndex">
			<a href="index.php"><button class="btn btn-success btn-xs" name="del"><span class="glyphicon glyphicon-circle-arrow-left"></span>    Retour &agrave; l'accueil</button></a>
		</span>
		<!--/. Retour accueil -->
				
		<br/>
		<ul>
		<!--
		<?php/*
			$sql = "SELECT id_lot,nom 
					FROM lot where id_lot = 1";
			$req = mysql_query($sql);			
			while($result = mysql_fetch_array($req))
			{	
				echo "<li>".$result['nom']."<ul>";
				$sql2 = "SELECT id_sousprojet,nom FROM sousprojet where id_lot = ".$result['id_lot'];
				$req2 = mysql_query($sql2);
				while($result2 = mysql_fetch_assoc($req2))
				{
					echo "<li>&nbsp;&nbsp;&nbsp;".$result2['nom']."<ul>";
					$sql3 = "SELECT nom FROM tache where id_sousprojet = ".$result2['id_sousprojet'];
					$req3 = mysql_query($sql3);
					while($result3 = mysql_fetch_assoc($req3))
					{
						echo "<li>&nbsp;&nbsp;&nbsp;".$result3['nom']."</li>";
					}
					echo "</ul>";
				}
				echo "</li>
					</ul>
				</li>";
			}
			mysql_close();
		*/?>-->
		</ul>
		<br/>	
<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
		
	</body>
</html>