<?php
	
			$idProject=$_SESSION['idProject'];
			$nameProject=$_SESSION['nameP'];
		
		
		
			
		
		$sqlCoutTache = "SELECT tr.id_tache, sum( r.cout * tr.taux_affectation * 0.01 ) as couttache
		FROM ressource r, tacheressource tr
		WHERE r.id_ressource = tr.id_ressource
		AND tr.id_projet = ".$idProject."
		group by (tr.id_tache)";
		$reqCoutTache = mysql_query($sqlCoutTache) or die('Erreur SQL'.mysql_error());
		while($resCoutTache=mysql_fetch_array($reqCoutTache))
		{
			$sqlupdatetache="UPDATE tache set cout = ".$resCoutTache['couttache']."
			WHERE id_tache =".$resCoutTache['id_tache'];
			$requpdatetache = mysql_query($sqlupdatetache)or die('Erreur sql'.mysql_error());
		}
		
		
		
		
		
		$sqlCoutPhase = "SELECT id_phase, sum(cout) as charge
				FROM tache
				GROUP BY (id_phase)";
		$reqCoutPhase = mysql_query($sqlCoutPhase) or die('Erreur SQL'.mysql_error());
		while ($resCoutPhase = mysql_fetch_array($reqCoutPhase))
		{
			$sqlupdatephase="UPDATE phase set charge = ".$resCoutPhase['charge']."
			WHERE id_phase =".$resCoutPhase['id_phase'];
			$requpdatephase = mysql_query($sqlupdatephase)or die('Erreur sql'.mysql_error());
		}
		
		
?>