<?php 
	include("connexion.php");
?>
<?php
	$idProject="9";
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
	$i=0;
while ($resLot=mysql_fetch_array($reqLot)) {
	$idLot=$resLot['id_lot'];
	$nomLot=$resLot['nom'];
	$sqlSousprojet= "SELECT nom, id_sousprojet
		FROM sousprojet
		WHERE id_lot='$idLot'";
	$reqSousprojet= mysql_query($sqlSousprojet);
	while ($resSousprojet=mysql_fetch_array($reqSousprojet)) {
		$idSousprojet=$resSousprojet['id_sousprojet'];
		$nomSousprojet=$resSousprojet['nom'];
		$sqlTache= "SELECT nom, date_debut_tot,date_fin_tard,id_phase
			FROM tache
			WHERE id_sousprojet='$idSousprojet'";
		$reqTache=mysql_query($sqlTache);
		while ($resTache=mysql_fetch_array($reqTache)) {
			$nomTache=$resTache['nom'];
			$debutTache=$resTache['date_debut_tot'];
			$finTache=$resTache['date_fin_tard'];
			echo $nomLot;echo"*";
			echo $nomSousprojet;echo"*";
			echo $nomTache;echo"*";
			echo $debutTache;echo"*";
			echo $finTache;echo"/";
			$tableau[$i]=array(
				'nomLot' => $nomLot,
				'nomSousprojet' => $nomSousprojet,
				'nomTache' => $nomTache,
				'de' => $debutTache,
				'a' => $finTache
			);
			$i=$i+1;
		}
	}
}
$cpt=0;
?>