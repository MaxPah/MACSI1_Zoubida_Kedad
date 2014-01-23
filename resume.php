<?php 
		session_start(); 
		$dbconn = mysql_connect("localhost", "root", "");
		$db = mysql_select_db("rugby", $dbconn);
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
        <title>MACSI 1</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="description" content=""/>
		<meta name="keywords" content=""/>
        <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen"/>
        <link rel="stylesheet" href="gs.css" type="text/css" media="screen"/>
		<link rel="icon" type="image/png" href="favicon.png" />
		<!--[if lte IE 8]>
			<script src="js/html5.js" type="text/javascript"></script>
		<![endif]-->
</head>
   	<body>
		<!-- BARRE DE NAVIGATION-->
		<nav class="navbar navbar-default" role="navigation">
 		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="#">Tache</a></li>
					<li><a href="#">Lot</a></li>
					<li><a href="#">Sous Projet</a></li>
					<li><a href="#">Jalons</a></li>
					<li><a href="#">Phase</a></li>
					<li><a href="#">Livrable</a></li>
				</ul>
				<form class="navbar-form navbar-right" role="search">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Rechercher">
					</div>
					<button type="submit" class="btn btn-default">Envoyer</button>
				</form>
			</div><!-- /.navbar-collapse -->
			<!-- BARRE DE NAVIGATION-->
		</nav>
				<br/>
				<ul>
					<?php
					$message ='';
							$sql = "SELECT id_club,nom_club 
									FROM club";
							$req = mysql_query($sql);
							while($result = mysql_fetch_assoc($req))
							{	
								echo "<li>".$result['nom_club']."<ul>";
									
											$sql2 = "SELECT id_joueur,nom_joueur FROM joueur where id_club = ".$result['id_club'];
											$req2 = mysql_query($sql2);
											while($result2 = mysql_fetch_assoc($req2))
											{
												echo "<li>&nbsp;&nbsp;&nbsp;".$result2['nom_joueur']."<ul>";
												
													$sql3 = "SELECT nom FROM competences where id_joueur = ".$result2['id_joueur'];
													$req3 = mysql_query($sql3);
													while($result3 = mysql_fetch_assoc($req3))
													{
														echo "<li>&nbsp;&nbsp;&nbsp;".$result3['nom']."</li>";
													}
																								echo "</ul>";
											}
												echo "</li>
																</ul>
										</li>";
							}
					?>
				</ul>
				<br/>		
	</body>
</html>