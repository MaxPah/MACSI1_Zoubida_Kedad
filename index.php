<!DOCTYPE html>
<?php 
		session_start(); 
		$dbconn = mysql_connect("localhost", "root", "");
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
		<!-- Lancer un projet existant-->
			<form method="POST" action="resume.php">
				<?php
					
					$sqlNameProject = "SELECT id_projet,nom 
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
				<br/>
			</form>
			<!-- Créer un nouveau projet-->
			<form method="POST" action="resume.php">
				<br/>
				<input type="title" class="form-control" name="nameP" placeholder="Nom du nouveau projet"> <br/>
				<textarea class="form-control" name="descP" placeholder="Description" rows="3"></textarea> <br/>
				<input type="title" class="form-control" name="envP" placeholder="Enveloppe budgétaire"> <br/>
				<label class="control-label">Date de fin pr&eacute;visionnelle</label>
				<input type="date" class="form-control" name="dateP" placeholder="Date de fin prévisionnelle"> <br/>
				<button class="btn btn-success" name= "new" type="submit"><span class="glyphicon glyphicon-plus"></span>    Lancer un nouveau projet</button>	<br/><br/>
			</form>
		</div>		
	</body>
</html>