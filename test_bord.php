<?php 
		session_start(); 
		$dbconn = mysql_connect("localhost", "root", "");
		$db = mysql_select_db("macsi1", $dbconn);
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
        <title><?php $nameProject = "TEST_BORD";
					echo $nameProject; 
				?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="description" content=""/>
		<meta name="keywords" content=""/>
        <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen"/>
        <link rel="stylesheet" href="gs.css" type="text/css" media="screen"/>
		 <link href="css/style.css" type="text/css" rel="stylesheet">
		<link rel="icon" type="image/png" href="favicon.png" />
		<!--[if lte IE 8]>
			<script src="js/html5.js" type="text/javascript"></script>
		<![endif]-->
				<style type="text/css">
			.contain {
				width: 800px;
				margin: 0 auto;
			}
			table th:first-child {
				width: 150px;
			}
			<!--  /* Bootstrap 3.0 re-reset */
			  .fn-gantt *,
			  .fn-gantt *:after,
			  .fn-gantt *:before {
				-webkit-box-sizing: content-box;
				   -moz-box-sizing: content-box;
						box-sizing: content-box;
			  }-->
		</style>
		

		
</head>
   	<body>
	
		<!-- BARRE DE NAVIGATION-->
		
		<?php  include ('navigation.php');?>
		<!--/. BARRE DE NAVIGATION-->
		<br/>
		<br/>
		<!--  A inclure en fin de fichier -->
		<!-- Ajouts -->
		
		
		<!-- Ajouter lot -->
		<?php 
		include ('modalAddLot.php'); ?>
		<!--/. Ajouter lot -->
		
		<!-- Ajouter phase -->
		<?php 
		include ('modalAddPhase.php'); ?>
		<!--/. Ajouter phase -->
		
		<!-- Ajouter sous-projet -->
		<?php 
		include ('modalAddSousProjet.php'); ?>
		<!--/. Ajouter sous-projet -->
	
		
		
		
	
	<!-- Tableau de Bord -->
			<div class="contain">
				<div class="gantt"></div>
			</div>


	<br/>	
<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-1.10.2.min.js"></script>
	<script src="js/bootstrap.min.js"></script>	
	<script src="js/jquery.fn.gantt.js"></script>
	<?php $sql = "SELECT * FROM recap";
		$req=mysql_query($sql);
		while($data=mysql_fetch_array($req));
		{
		$de = $data['de'];
		$a = $data['a'];
		$lot = $data['lot'];
		$sousprojet = $data['sousprojet'];
		$tache = $data['tache'];
		}
	?><script>
	
		$(function($de,$a,$lot,$sousprojet,$tache) {

			"use strict";

			$(".gantt").gantt({
				source: [{
					name: lot,
					desc: "sousprojet",
					values: [{
						from: "/Date(1320192000000)/",
						to: "/Date(1322401600000)/",
						label: "tache",
						customClass: "ganttRed"
					}]
				}],
				navigate: "scroll",
				maxScale: "hours",
				itemsPerPage: 13,
				
			});
		});
	
	</script>	
	
	</body>
</html>