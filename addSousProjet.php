<!DOCTYPE html>
<?php 
	include("connexion.php");
?>
<html lang="fr">

	<head>
			<title>Ajout d'un lot</title>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

			<link rel="icon" type="image/x-icon" href="img/favicon.png"/>
			<link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen"/> 
			<link rel="stylesheet" href="gs.css" type="text/css" media="screen"/> 
	</head>
<?php
	if(isset($_POST['nameL'])) {
		$nameLot=$_POST['nameL'];
	}
	$sqlIdLot= "SELECT id_lot
				FROM lot
				WHERE nom = '$nameLot'";
	$reqIdLot=mysql_query($sqlIdLot);
	$resIdLot= mysql_fetch_array($reqIdLot);
	$idLot=$resIdLot['id_lot'];
	if(isset($_POST['nameSP'])) {
		$nameSousProjet = $_POST['nameSP'];
		$reqSqlAddSousProjet = 'INSERT INTO sousprojet(nom,id_lot) VALUES ("'.$nameSousProjet.'", "'.$idLot.'")';
		mysql_query($reqSqlAddSousProjet) or die ('Erreur SQL !'.$reqSqlAddSousProjet.'<br />'.mysql_error());
	}
?>
	<body>
		<div id="bloc_central">
			<form method="POST" action="resume.php">
				<?php echo "<label class=\"form-control\">".$nameSousProjet." a bien &eacute;t&eacute; ajout&eacute; aux sous-projets</label>";
				echo "<input type = \"hidden\" name=\"nameP\" value=\"".$_SESSION['nameP']."\">";?>
				<br/>	
				<button class="btn btn-success" name ="old" type="submit" class="btn btn-primary" >Retourner au menu principal</button>
			</form>
			<br/><br/>
			<form action="index.php">
				<button class="btn btn-default" >Fermer le projet</button>
			</form>
		</div>		 
	</body>
</html>