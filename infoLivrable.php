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
	
	<?php 
		if(isset($_POST['youlo'])) {
		 $idL = $_POST['idL'];
		$idT = $_POST['nameT'];
			
		$reqSql = 'UPDATE tache set id_livrable ="'.$idL.'"
					WHERE nom = "'.$idT.'"';
		mysql_query($reqSql) or die ('Erreur SQL'.mysql_error());
		}
		?>
	
	
	<!-- INFOS SUR LE LOT -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<?php 	
				$idL = $_GET['idL'];
				$sqlLivrable = " SELECT *
							FROM livrable
							WHERE id_livrable =".$idL;
				
				$reqLivrable = mysql_query($sqlLivrable) or die('Erreur requete : '.mysql_error());
				$resLivrable = mysql_fetch_array($reqLivrable) or die('Erreur result : '.mysql_error());
				$nomLivrable = $resLivrable['nom'];
				$id_jalon = $resLivrable['id_jalon'];
				
				echo "<strong>Infos de ".$nomLivrable."</strong>";
			?>
		</div>
		
		<ul class="list-group">
			<li class="list-group-item">
				<?php echo "<u><strong><i>Description</i></strong></u> : ".$resLivrable['description']; ?>
			</li>
		</ul>
		<ul class="list-group"> 
			<?php // Jalons
			if($resLivrable['id_jalon'] != null){
				$sqlSP = "SELECT nom,id_jalon
						FROM jalon j
						WHERE id_jalon =".$resLivrable['id_jalon'];
				$reqSP = mysql_query($sqlSP) or die('Erreur ICI requete 2 : '.mysql_error());
				while($resSP = mysql_fetch_array($reqSP))					
				echo "<li class=\"list-group-item\"> <u><strong><i>Jalon</i></strong></u> : <a href=\"infoJalon.php?idJ=".$resSP['id_jalon']."\">".$resSP['nom']."</a></li>";
			}
			?>
		</ul>
		<ul class="list-group">
		<li class="list-group-item">
			<strong>Affecter une nouvelle tache &agrave; ce livrable :  </strong>
			<br/><br/>
				<?php
				echo" <form method=\"POST\" action=\"infoLivrable.php?idL=".$idL."\">";
			
					$sqlNameT = "SELECT t.nom,t.id_tache
									   FROM tache t, phase p 
									   WHERE t.id_phase = p.id_phase
									   AND p.id_projet=".$_SESSION['idProject'];
					$reqNameT = mysql_query($sqlNameT);
					echo "<select class=\"form-control\" name=\"nameT\">";
					while($resultNameT = mysql_fetch_array($reqNameT))
					{
						echo "<option>".$resultNameT['nom']."</option>";
					}
					echo "</select>";
				?>
				<br/>
				<input type="hidden" name="idl" value="<?php echo $idL;?>">			
				<button class="btn btn-primary btn-sm" name="youlo" type="submit"><span class="glyphicon glyphicon-plus"></span>Affecter cette tache</button>				
			<br/><br/>
				</form>
		</li>
		</ul>
		<ul class="list-group">
			<?php 
				$sqlSP = 'SELECT id_tache,nom
						FROM tache
						WHERE id_livrable ="'.$idL.'"';
				$reqSP = mysql_query($sqlSP) or die('Erreur requete 2 : '.mysql_error());
				while($resSP = mysql_fetch_array($reqSP))					
				echo "<li class=\"list-group-item\"> <u><strong><i>Tache</i></strong></u> : <a href=\"infoTache.php?idT=".$resSP['id_tache']."\">".$resSP['nom']."</a></li>";
			?>
		
		</ul>
	</div>
	</body>

</html>