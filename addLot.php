<!DOCTYPE html>
<?php 
		session_start(); 
		$dbconn = mysql_connect("localhost", "root", "");
		$db = mysql_select_db("macsi1", $dbconn);
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
	if(isset($_POST['nameP'])) {
		$nameProject=$_POST['nameP'];
	}
	$sqlIdProject= "	SELECT id_projet
				FROM projet
				WHERE nom = '$nameProject'";
	$reqIdProject=mysql_query($sqlIdProject);
	$idProjectArray= mysql_fetch_array($reqIdProject);
	$idProject=$idProjectArray['id_projet'];
	if(isset($_POST['nameL'])) {
		$nameLot = $_POST['nameL'];
		$reqSqlAddLot = 'INSERT INTO lot(nom,id_projet) VALUES ("'.$nameLot.'", "'.$idProject.'")';
		mysql_query($reqSqlAddLot) or die ('Erreur SQL !'.$reqSqlAddProject.'<br />'.mysql_error());
	}
?>
	<body>
		<div id="bloc_central">
			<!-- Créer un nouveau projet-->
			<form method="POST" action="resume.php">
				<?php echo "<label class=\"form-control\">".$nameLot." a bien ete ajoute aux lots</label>";
				echo "<input type = \"hidden\" name=\"nameP\" value=\"".$nameProject."\">";?>
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