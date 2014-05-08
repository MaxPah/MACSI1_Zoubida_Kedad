<?php 
	include("connexion.php");
?>

<?php
	
			$idProject=$_SESSION['idProject'];
			$nameProject=$_SESSION['nameP'];
		
		
		$sqlCoutProjet ="SELECT SUM( r.cout * tr.taux_affectation /100 ) AS coutprojet
						FROM ressource r, tacheressource tr
						WHERE tr.id_projet = ".$_SESSION['idProject']."
						AND r.id_ressource = tr.id_ressource
						";
			$reqCoutProjet = mysql_query($sqlCoutProjet);
			$resCoutProjet = mysql_fetch_array($reqCoutProjet);
			
		
		
		$reqCoutPhase = " UPDATE projet SET enveloppe_budg = ".$resCoutProjet['coutprojet']."
						WHERE id_projet =".$_SESSION['idProject'];
		mysql_query($reqCoutPhase) or die ('Erreur SQL !'.$reqCoutPhase.'<br />'.mysql_error());
		
?>