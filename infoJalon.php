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
		if(isset($_POST['valid'])) {
		$val=explode('-',$_POST['nameT']);
		 $idJ = $_GET['idJ'];			
		$reqSql = "UPDATE livrable SET id_jalon ='".$idJ."' WHERE id_livrable = '".$val[1]."'";
		mysql_query($reqSql) or die ('Erreur SQL'.mysql_error());
		}
		?>
	
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
				
				echo "<strong>Infos de ".$nomJ."</strong>";
			?>
		</div>
		<ul class="list-group">
		<?php
			$sqlJ = 'SELECT j.date,j.evenement, p.nom,p.id_phase
						 FROM jalon j, phase p
						 WHERE id_jalon ="'.$idJ.'"
						 AND p.id_phase = j.id_phase';
			$reqJ = mysql_query($sqlJ) or die('Erreur requete 2 : '.mysql_error());
			while($resJ = mysql_fetch_array($reqJ))					
			{
				echo "<li class=\"list-group-item\"> <u><strong><i>Phase</i></strong></u> : <a href=\"infoPhase.php?idP=".$resJ['id_phase']."\">".$resJ['nom']."</a></li>";
				echo "<li class=\"list-group-item\"> <u><strong><i>Date </i></strong></u> : ".$resJ['date']."</li>";
				echo "<li class=\"list-group-item\"> <u><strong><i>Evenement </i></strong></u> : ".$resJ['evenement']."</li>";
			}
		?>
		</ul>
	</div>
	
	<div class="panel panel-default">
		<div class="panel-heading">
			<?php 
				echo "<strong>Livrables de ".$nomJ."</strong>";
			?>
		</div>
			<ul class="list-group">
			<li class="list-group-item">
			<strong>Lier un nouveau livrable a ce jalon :  </strong>
			<br/><br/>
				<?php
				echo" <form method=\"POST\" action=\"infoJalon.php?idJ=".$idJ."\">";
			
					$sqlNameT = "SELECT l.nom as N,l.id_livrable
									   FROM livrable l
									   WHERE l.id_projet=".$_SESSION['idProject']."
									   AND l.id_jalon IS NULL";
					$reqNameT = mysql_query($sqlNameT);
					echo "<select class=\"form-control\" name='nameT'>";
					while($resultNameT = mysql_fetch_array($reqNameT))
					{
						echo "<option>".$resultNameT['N']."-".$resultNameT['id_livrable']."</option>";
					}
					echo "</select>";
				?>
				<br/>
				<button class="btn btn-primary btn-sm" name="valid" type="submit"><span class="glyphicon glyphicon-plus"></span>Ajouter ce livrable</button>				
			<br/><br/>
				</form>
		</li>
		</ul>
		<ul class="list-group">
		<?php
			$sqlJ = 'SELECT nom,id_livrable
					FROM livrable 
					WHERE id_jalon = '.$idJ;
			$reqJ = mysql_query($sqlJ) or die('Erreur requete 2 : '.mysql_error());
			while($resJ = mysql_fetch_array($reqJ))					
			{
				echo "<li class=\"list-group-item\"> <u><strong><i>Livrable</i></strong></u> : <a href=\"infoLivrable.php?idL=".$resJ['id_livrable']."\">".$resJ['nom']."</a></li>";
			}
		?>
		</ul>
	</div>
	</body>

</html>