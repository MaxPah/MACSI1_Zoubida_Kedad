<ul class="list-group">
  <?php 
  $sqlIdProjet = ' SELECT id_projet
  					FROM projet
  					WHERE nom = "'.$nameProject.'"';
  					
  	$reqIdProjet = mysql_query($sqlIdProjet) or die('Erreur query : '.mysql_error());
  	$resIdProjet = mysql_fetch_array($reqIdProjet) or die('Erreur result : '.mysql_error());
  	$idProjet = $resIdProjet['id_projet'];
  
	$sqlTache = "SELECT t.id_tache, t.nom as nomTache, s.nom as nomSP, p.nom as nomP
					FROM tache t,sousprojet s, phase p
					WHERE t.id_sousprojet = s.id_sousprojet
					AND t.id_phase = p.id_phase
					AND p.id_projet = $idProjet";
					
	$reqTache=mysql_query($sqlTache) or die('Erreur query 2 : '.mysql_error());
						
	while ($resTache= mysql_fetch_array($reqTache)) {
		echo"
		<li class=\"list-group-item\">";
				echo "<span class=\"badge\">Phase : ".$resTache['nomP']."</span>";
				echo "<span class=\"badge\">Sous Projet : ".$resTache['nomSP']."</span>";
				echo "<a href=\"infoTache.php?idT=".$resTache['id_tache']."&nameP=".$nameProject."\">".$resTache['nomTache']."</a>
		</li>";
		}
?>
</ul>
