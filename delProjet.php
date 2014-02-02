<!DOCTYPE html>
<?php 
		session_start(); 
		$dbconn = mysql_connect("localhost", "root", "");
		$db = mysql_select_db("macsi1", $dbconn);
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
		<?php if(isset($_POST['verifDel'])) { ?>
				<form method="POST" action="delProjet.php">
					<label class="control-label">etes vous sur(e) de vouloir supprimer le projet ?</label>
					<input type = "hidden" name="nameP" value="<?php echo $_POST['nameP'];?>">
					<br/>
					<button class="btn btn-success" name="del" type="submit" class="btn btn-primary" >Supprimer</button>
					<button type="submit" name="annule" class="btn btn-default" >Annuler</button>
				</form>
				<br/>
		<?php }
		else if(isset($_POST['annule'])){
		?>
			<form name="formAnnule" method="POST" action="resume.php">
				<input type = "hidden" name="nameP" value="<?php echo $_POST['nameP'];?>">
			</form>
			<script type="text/javascript"> 
				document.formAnnule.submit(); //Envoie le formulaire vers resume.php 
			</script>
		<?php }
		else if(isset($_POST['del']))
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
		?>
			<label class="form-control">Le projet <?php echo $nameProject; ?> a bien &eacute;t&eacute; supprim&eacute;</label><br/><br/><br/>
			<form action="index.php">
				<button class="btn btn-success" type="submit" class="btn btn-primary" >Retourner &agrave; l'accueil</button>
			</form>
		<?php } ?>
	</div>
</body>
</html>
