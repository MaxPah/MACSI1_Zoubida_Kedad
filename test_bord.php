<link href="css/style.css" type="text/css" rel="stylesheet">

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

<div class="contain">
	<div class="gantt"></div>
</div>

<script src="js/jquery.fn.gantt.js"></script>
		
<?php /* $sql = "SELECT * FROM recap";
	$req=mysql_query($sql);
	while($data=mysql_fetch_array($req));
	{*/
	/*if(isset($_POST['is']{
	}*/
	$sqlLot= "SELECT nom, id_lot
			FROM lot
			WHERE id_projet='$idProject'";
	$reqLot=mysql_query($sqlLot);
	
	
	$sqlPhase= "SELECT nom
			FROM phase
			WHERE id_projet='$idProject'";
	$reqPhase=mysql_query($sqlPhase);
	$nomLot="lot1";
	$nomSousprojet="SP 1";
	$resTache['nom']="tache 1";
?>	
<?php echo "
<script type=\"text/javascript\">
	$(function() {	
		\"use strict\";


		$(\".gantt\").gantt({
			";
				while ($resLot=mysql_fetch_array($reqLot)) {
					$idLot=$resLot['id_lot'];
					$nomLot=$resLot['nom'];
					$sqlSousprojet= "SELECT nom, id_sousprojet
						FROM sousprojet
						WHERE id_lot='$idLot'";
					$reqSousprojet= mysql_query($sqlSousprojet);
					while ($resSousprojet=mysql_fetch_array($reqSousprojet)) {
						$idSousprojet=$resSousprojet['id_sousprojet'];
						$nomTache=$resSousprojet['nom'];
						$sqlTache= "SELECT nom, date_debut_tot,date_fin_tard,id_phase
							FROM tache
							WHERE id_sousprojet='$idSousprojet'";
						$reqTache=mysql_query($sqlTache);
						while ($resTache=mysql_fetch_array($sqltache)) {
						 
						echo"
			source: [{
				name: \"lot 1\",
				desc: \"SP 1\",
				values: [{
					from: \"10-08-2010\",
					to: \"11-08-2010\",
					label: \"tache 1\",
					customClass: \"ganttRed\"
				}]
			},
			],";
			 }}}
			 echo "
			navigate: \"scroll\",
			maxScale: \"hours\",
			itemsPerPage: 13,
			
		});
	})
</script>"; ?>