<!DOCTYPE html>
<?php 
	include("connection.php");
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
			$nameProject = $_POST['nameP'];
			
			$sqlIdProject = "SELECT id_projet
							 FROM projet
							 WHERE nom = '$nameProject'";
							 
			$reqIdProject = mysql_query($sqlIdProject) 
								or die ('Erreur SQL !'.$sqlIdProject.'<br />'.mysql_error());
			
			$idProjectArray = mysql_fetch_array($reqIdProject);
			
			$idProject = $idProjectArray['id_projet'];	

			$reqSqlDelProj = "DELETE FROM projet 
							  WHERE id_projet='$idProject'";
							  
			mysql_query($reqSqlDelProj) 
					or die ('Erreur SQL !'.$reqSqlDelProj.'<br />'.mysql_error());
		}
		
		echo "<label class=\"form-control\">Le projet ".$nameProject." a bien &eacute;t&eacute; supprim&eacute;</label><br/><br/><br/>";
		echo "<form action=\"index.php\">";
		echo "<button class=\"btn btn-success\" type=\"submit\" class=\"btn btn-primary\" >Retourner &agrave; l'accueil</button>";
		echo "</form>";
	?>
	
	</div>
</body>
</html>
