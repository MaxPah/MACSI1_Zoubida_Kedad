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
		<link rel="icon" type="image/png" href="favicon.png" />
		<!--[if lte IE 8]>
			<script src="js/html5.js" type="text/javascript"></script>
		<![endif]-->
</head>
   	<body>
		<?php
			/*** Création d'un nouveau projet ***/
			if(isset($_POST['new'])) {
				$reqSqlAddProject = 'INSERT INTO projet(nom,enveloppe_budg) VALUES ("'.$nameProject.'", 0)';
				mysql_query($reqSqlAddProject) or die ('Erreur SQL !'.$reqSqlAddProject.'<br />'.mysql_error());
			}
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
			<!--/.Ajouts -->
		
			<!--Suppression -->
				<!-- Supprimer lot -->
					<?php include ('modalDelLot.php'); ?>
				<!--/. Supprimer lot -->
		
				<!-- Supprimer phase -->
					<?php include ('modalDelPhase.php'); ?>
				<!--/. Supprimer phase -->
		
				<!-- Supprimer projet -->
					<form method="POST" class="supprProj" action="delProjet.php">
						<input type = "hidden" name="nameP" value="<?php echo $nameProject;?>">
						<div class="form-group">
							<button class="btn btn-danger btn-xs" name="verifDel" type="submit"><span class="glyphicon glyphicon-trash"></span>    Supprimer ce projet</button>
						</div>
					</form>
				<!--/. Supprimer projet -->
		
		<!-- Retour accueil -->
			<span class="retourIndex">
				<a href="index.php"><button class="btn btn-success btn-xs" name="del"><span class="glyphicon glyphicon-circle-arrow-left"></span>    Retour &agrave; l'accueil</button></a>
			</span>
		<!--/. Retour accueil -->

		<br/>
		<?php mysql_close(); ?>
		<br/>	
<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-1.10.2.min.js"></script>
	<script src="js/bootstrap.min.js"></script>		
	
	</body>
</html>