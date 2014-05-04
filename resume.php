<?php 
	include("connexion.php");
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
        <title>Gestion de Projets</title>
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
				$nameProject = $_POST['nameP'];
				$date = $_POST['dateP'];
				$env = $_POST['envP'];
				$desc = $_POST['descP'];
				$reqSqlAddProject = 'INSERT INTO projet(nom,enveloppe_budg,description,datedeb,datefin) VALUES ("'.$nameProject.'", "'.$env.'","'.$desc.'","'.date("Y-m-d").'","'.$date.'")';
				mysql_query($reqSqlAddProject) or die ('Erreur SQL !'.$reqSqlAddProject.'<br />'.mysql_error());
			}
		?>
		<!-- BARRE DE NAVIGATION-->
		
		<?php 
			if(isset($_POST['nameP']))
				$nameProject = $_POST['nameP']; 
			else if(isset($_GET['nameP']))
				$nameProject = $_GET['nameP'];
			else $nameProject = $_SESSION['nameP'];
				
			$sqlP = "SELECT nom,id_projet
					 FROM projet
					 WHERE nom ='$nameProject'";
							
			$reqP=mysql_query($sqlP) or die('Erreur query 2 : '.mysql_error());			
			while ($resP= mysql_fetch_array($reqP)) {
				$_SESSION['nameP'] = $resP['nom'];
				$_SESSION['idProject'] = $resP['id_projet'];
				}

		include ('navigation.php');?>
		
		<?php include ('includesNavBar.php'); ?>
		
		<!--/. BARRE DE NAVIGATION-->
		<br/>
		
		<!-- Gantt -->
		<?php include ('test_bord.php'); ?>		
				
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
	</body>
</html>