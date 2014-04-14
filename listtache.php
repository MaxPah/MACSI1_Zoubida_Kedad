<ul class="list-group">
  <?php 
  
	$sqlIdTache = "SELECT t.nom, t.id_phase , t.id_sousprojet
					FROM tache t,sousprojet s, phase p
					WHERE t.id_sousprojet=s.id_sousprojet
					OR t.id_phase= p.id_phase
					GROUP BY(t.id_tache)";
	$reqIdTache=mysql_query($sqlIdTache);
						
	while ($resIdTache= mysql_fetch_array($reqIdTache)) {
		echo"
		<li class=\"list-group-item\">";
				echo "<span class=\"badge\">Phase : ".$resIdTache['id_phase']."</span>";
				echo "<span class=\"badge\">Sous Projet : ".$resIdTache['id_sousprojet']."</span>";
			echo $resIdTache['nom'];"
		</li>";
		}
?>
</ul>
