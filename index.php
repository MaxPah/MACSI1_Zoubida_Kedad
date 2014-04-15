<!DOCTYPE html>
<?php 
		session_start(); 
		$dbconn = mysql_connect("localhost", "root", "root");
		$db = mysql_select_db("macsi1", $dbconn);
?>
<html lang="fr">

	<head>
			<title>Gestion de Projets</title>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

			<link rel="icon" type="image/x-icon" href="img/favicon.png"/>
			<link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen"/> 
			<link rel="stylesheet" href="gs.css" type="text/css" media="screen"/> 
	</head>

	<body>
	
		<div id="bloc_central">
			<!-- Créer un nouveau projet-->
			<form method="POST" action="resume.php">
				<input type="title" class="form-control" name="nameP" placeholder="Nom du nouveau projet"> <br/>
				<button class="btn btn-success" name= "new" type="submit"><span class="glyphicon glyphicon-plus"></span>    Lancer un nouveau projet</button>	<br/><br/>
			</form>
			<!-- Lancer un projet existant-->
			<form method="POST" action="resume.php">
				<?php
					$sqlNameProject = "SELECT nom 
										FROM projet";
					$reqNameProject = mysql_query($sqlNameProject);
					echo "<select class=\"form-control\" name=\"nameP\">";
					while($resultNameProject = mysql_fetch_array($reqNameProject))
					{
						echo "<option>".$resultNameProject['nom']."</option>";
					}
					echo "</select>";
				?>
				<br/>
				<button class="btn btn-primary" name="old" type="submit"><span class="glyphicon glyphicon-circle-arrow-down"></span>    Choisir ce projet</button>				
			</form>
		</div>		
	<?php
		
	/*	if(isset($_POST['nouveau']))
		{
			$sql = "INSERT INTO projet(nom) VALUES()";
			mysql_query($sql);	
			
			$sql = "SELECT id_projet 
					FROM projet
					WHERE nom = $_POST['intituleProjet']";
			$req = mysql_query($sql); 
			
			$result = mysql_fetch_array($req);
			header('Location: resume.php?id=$result["id_projet"]');
		}
		
		else if(isset($_POST['existant']))
		{
			$sql = "SELECT id_projet 
					FROM projet
					WHERE nom = $_POST['nom_projet']";
			$req = mysql_query($sql); 
			
			$result = mysql_fetch_array($req);
			header('Location: resume.php?id=$result["id_projet"]');
		}
		*/
	?> 
	
	</body>

</html>