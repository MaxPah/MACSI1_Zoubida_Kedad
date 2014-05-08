<!DOCTYPE html>
<?php 
	include("connexion.php");
?>
<html lang="fr">

<head>
		<title>Suppression d'un projet</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		
		<link rel="icon" type="image/x-icon" href="img/favicon.png"/>
		<link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen"/> 
		<link rel="stylesheet" href="gs.css" type="text/css" media="screen"/> 
</head>

<body>
	<div id="bloc_central">

	<?php
		if(isset($_POST['del']))
		{
			$reqSqlDelProj = "DELETE FROM projet 
							  WHERE id_projet=".$_SESSION['idProject'];
							  
			mysql_query($reqSqlDelProj) 
					or die ('Erreur SQL !'.$reqSqlDelProj.'<br />'.mysql_error());
		}
		
		echo "<label class=\"form-control\">Le projet ".$_SESSION['nameP']." a bien &eacute;t&eacute; supprim&eacute;</label><br/><br/><br/>";
		echo "<form action=\"index.php\">";
		echo "<button class=\"btn btn-success\" type=\"submit\" class=\"btn btn-primary\" >Retourner &agrave; l'accueil</button>";
		echo "</form>";
	?>
	
	</div>
</body>
</html>
