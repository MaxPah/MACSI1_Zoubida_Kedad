<nav class="navbar navbar-default" role="navigation\>
	<div class="collapse navbar-collapse">
		<ul class="nav navbar-nav">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
				</button>
				<?php echo "<a href='resume.php' class=\"navbar-brand\">".$_SESSION['nameP']."</a>"; ?>
			</div>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Ressources  <b class="caret"></b></a>
				<ul class="dropdown-menu">
				<?php
					echo "<li><a href='infoRess.php'>Voir Ressources</a></li>";
				?>
					<li class="divider"></li>
					<li class="dropdown-header">Action</li>
					<li><a data-toggle="modal" href="#addRessource">Ajouter Ressource</a></li>
					<li><a data-toggle="modal" href="#delRessource" >Supprimer Ressource</a></li>
				</ul>
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Lots  <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<?php
						$estLot=false; //variable qui permet de voir si on a des lots existants
						$estSousprojet=false; //variable qui permet de voir si on a des sousprojets existants
						
						
						$idProject= $_SESSION['idProject'];
						$sqlLot= "  SELECT nom,id_lot
									FROM lot
									WHERE id_projet = '$idProject'";
						$reqLot=mysql_query($sqlLot);
						
						while($nomLot = mysql_fetch_array($reqLot)) {
							echo "<li><a href='infoLot.php?idL=".$nomLot['id_lot']."'>Voir ".$nomLot['nom']."</a></li>";
							$estLot=true;
						}
					?>
					<li class="divider"></li>
					<li class="dropdown-header">Action</li>
					<li><a data-toggle="modal" href="#addLot">Ajouter Lot</a></li>
					<li><a data-toggle="modal" href="#delLot" >Supprimer Lot</a></li>
				</ul>
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Phases  <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<?php
						$estPhase=false; //variable qui permet de voir si on a des phases existantes
						$sqlIdProject= "	SELECT id_projet
							FROM projet
							WHERE nom = '$nameProject'";
						$reqIdProject=mysql_query($sqlIdProject);
						$idProjectArray= mysql_fetch_array($reqIdProject);
						$idProject=$idProjectArray['id_projet'];
						$sqlPhase= "	SELECT nom,id_phase
							FROM phase
							WHERE id_projet = '$idProject'";
						$reqPhase=mysql_query($sqlPhase);
						
						while($nomPhase = mysql_fetch_array($reqPhase)) {
							echo "<li><a href='infoPhase.php?idP=".$nomPhase['id_phase']."'>Voir ".$nomPhase['nom']."</a></li>";
							$estPhase=true;
						}
					?>
					<li class="divider"></li>
					<li class="dropdown-header">Action</li>
					<li><a data-toggle="modal" href="#addPhase">Ajouter Phase</a></li>
					<li><a data-toggle="modal" href="#delPhase" >Supprimer Phase</a></li>
				</ul>
			</li>
			<?php
				if($estLot) { // si on a des lots, on affiche les sous projets
			?>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Sous-projet  <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<?php
						$sqlIdLot = "SELECT id_lot
							FROM lot
							WHERE id_projet='$idProject'";
						$reqIdLot=mysql_query($sqlIdLot);
						
						while($resIdLot=mysql_fetch_array($reqIdLot)) {
							$idLot=$resIdLot['id_lot'];
							$sqlNomLotTmp= "SELECT nom
								FROM lot
								WHERE id_lot= '$idLot'";
							$reqNomLotTmp=mysql_query($sqlNomLotTmp);
							
							if($nomLotTmp = mysql_fetch_array($reqNomLotTmp)) {
								echo "<li class=\"dropdown-header\">".$nomLotTmp['nom']."</li>";
								
							}
							$sqlSousProjet= "SELECT nom,id_sousprojet
								FROM sousprojet
								WHERE id_lot = '$idLot'";
							$reqSousProjet=mysql_query($sqlSousProjet);
							
							while($nomSousProjet = mysql_fetch_array($reqSousProjet)) {
								echo "<li><a href='infoSousProjet.php?idSP=".$nomSousProjet['id_sousprojet']."'>Voir ".$nomSousProjet['nom']."</a></li>";
								$estSousprojet=true;
							}
						}
					?>
					<li class="divider"></li>
					<li class="dropdown-header">Action</li>
					<li><a data-toggle="modal" href="#addSousProjet">Ajouter Sous-projet</a></li>
					<li><a data-toggle="modal" href="#delSousProjet" >Supprimer Sous-projet</a></li>
				</ul>
			</li>
			<?php }?>
			<?php
				if($estPhase) { // si on a des phases, on affiche les jalons
			?>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Jalon  <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<?php
						$sqlIdPhase = "SELECT id_phase
							FROM phase
							WHERE id_projet='$idProject'";
						$reqIdPhase=mysql_query($sqlIdPhase);
						
						while($resIdPhase=mysql_fetch_array($reqIdPhase)) {
							$idPhase=$resIdPhase['id_phase'];
							$sqlNomPhaseTmp= "SELECT nom
								FROM phase
								WHERE id_phase= '$idPhase'";
							$reqNomPhaseTmp=mysql_query($sqlNomPhaseTmp);
							
							if($nomPhaseTmp = mysql_fetch_array($reqNomPhaseTmp)) {
								echo "<li class=\"dropdown-header\">".$nomPhaseTmp['nom']."</li>";
							}
							$sqlJalon= "SELECT nom,id_jalon
								FROM jalon
								WHERE id_phase = '$idPhase'";
							$reqJalon=mysql_query($sqlJalon);
							
							while($nomJalon = mysql_fetch_array($reqJalon)) {
								echo "<li><a href='infoJalon.php?idJ=".$nomJalon['id_jalon']."'>Voir ".$nomJalon['nom']."</a></li>";
								}
						}
					?>
					<li class="divider"></li>
					<li class="dropdown-header">Action</li>
					<li><a data-toggle="modal" href="#addJalon">Ajouter Jalon</a></li>
					<li><a data-toggle="modal" href="#delJalon" >Supprimer Jalon</a></li>
				</ul>
			</li>
			<?php }
				if($estPhase && $estSousprojet) { // si on a des phases et des sous projet, on affiche les taches
			?>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Tache  <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li class="dropdown-header">Action</li>
					<li><a data-toggle="modal" href="#addTache">Ajouter Tache</a></li>
					<li><a data-toggle="modal" href="#delTache" >Supprimer Tache</a></li>
				</ul>
			</li>
			<?php } 
				if($estPhase && $estSousprojet) {
			?>
			
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Livrables  <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<?php
						$sqlLivrable= "	SELECT nom,id_livrable
							FROM livrable
							WHERE id_projet = '$idProject'";
						$reqLivrable=mysql_query($sqlLivrable);
						
						while($nomLivrable = mysql_fetch_array($reqLivrable)) {
							echo "<li><a href='infoLivrable.php?idL=".$nomLivrable['id_livrable']."'>Voir ".$nomLivrable['nom']."</a></li>";
						}
					?>	
					<li class="divider"></li>
					<li class="dropdown-header">Action</li>
					<li><a data-toggle="modal" href="#addLivrable">Ajouter Livrable</a></li>
					<li><a data-toggle="modal" href="#delLivrable" >Supprimer Livrable</a></li>
				</ul>
			</li>
			<?php } ?>
			
			</ul>
			<ul class="nav nav-pills navbar-right"style="margin-right:20px; margin-top:5px;">
				<?php echo "<li class=\"active\"><a href=\"bord.php\">Recap</a></li>"; ?>
			</ul>		
	</div>
</nav>