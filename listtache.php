<ul class="list-group">
  <?php 
  
	$sqlIdTache = "SELECT t.nom as nomTache, s.nom as nomSP, p.nom as nomP
					FROM tache t,sousprojet s, phase p
					WHERE t.id_sousprojet=s.id_sousprojet
					AND t.id_phase= p.id_phase";
	$reqIdTache=mysql_query($sqlIdTache);
						
	while ($resIdTache= mysql_fetch_array($reqIdTache)) {
		echo"
		<li class=\"list-group-item\">";
				echo "<span class=\"badge\">Phase : ".$resIdTache['nomP']."</span>";
				echo "<span class=\"badge\">Sous Projet : ".$resIdTache['nomSP']."</span>";
			echo $resIdTache['nomTache'];"
		</li>";
		}
?>
</ul>
