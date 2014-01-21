<!DOCTYPE html>
<html lang="fr">

	<head>
			<title>Gestion de Projets</title>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

			<link rel="icon" type="image/x-icon" href="img/favicon.png"/>
			<link rel="stylesheet" href="dist/css/bootstrap.css" type="text/css" media="screen"/> 
			<link rel="stylesheet" href="gs.css" type="text/css" media="screen"/> 
	</head>

	<body>
	
		<div id="bloc_central">
			<form method="POST">
				<input type="title" class="form-control" id="intituleProjet" placeholder="Nom du nouveau projet"> <br/>
				<button class="btn btn-success" name="nouveau" type="submit">Lancer un nouveau projet</button>	<br/><br/>
				<?php
					/*$sql = "SELECT nom 
							FROM projet";
					$req = mysql_query($sql);
					echo "<select class='form-control' name='nom_projet'>";
					while($result = mysql_fetch_assoc($req))
					{
						echo "<option>".$result['nom']."</option>";
					}
					echo "</select>";*/
				?>
				<select class="form-control">
				  <option>Projet 1</option>
				  <option>Projet 2</option>
				  <option>Projet 3</option>
				  <option>Projet 4</option>
				</select> <br/>
				<button class="btn btn-primary" name="existant" type="submit">Choisir ce projet</button>				
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