<nav class="navbar navbar-default" role="navigation\>
<div class="collapse navbar-collapse">
	<ul class="nav navbar-nav">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
			</button>
			<a class="navbar-brand" href="#">
				<?php echo $nameProject; ?>
			</a>
		</div>
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Lots  <b class="caret"></b></a>
			<ul class="dropdown-menu">
				<?php
					$isLot=false; //variable qui permet de voir si on a des lots existants
					$sqlIdProject= "SELECT id_projet
						FROM projet
						WHERE nom = '$nameProject'";
					$reqIdProject=mysql_query($sqlIdProject);
					$idProjectArray= mysql_fetch_array($reqIdProject);
					$idProject=$idProjectArray['id_projet'];
					$sqlLot= "	SELECT nom
						FROM lot
						WHERE id_projet = '$idProject'";
					$reqLot=mysql_query($sqlLot);
					while($nomLot = mysql_fetch_array($reqLot)) {
						echo "<li><a href=\"#\">Voir ".$nomLot['nom']."</a></li>";
						$isLot=true;
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
					$sqlIdProject= "	SELECT id_projet
						FROM projet
						WHERE nom = '$nameProject'";
					$reqIdProject=mysql_query($sqlIdProject);
					$idProjectArray= mysql_fetch_array($reqIdProject);
					$idProject=$idProjectArray['id_projet'];
					$sqlPhase= "	SELECT nom
						FROM phase
						WHERE id_projet = '$idProject'";
					$reqPhase=mysql_query($sqlPhase);
					while($nomPhase = mysql_fetch_array($reqPhase)) {
						echo "<li><a href=\"#\">Voir ".$nomPhase['nom']."</a></li>";
					}
				?>
				<li class="divider"></li>
				<li class="dropdown-header">Action</li>
				<li><a data-toggle="modal" href="#addPhase">Ajouter Phase</a></li>
				<li><a data-toggle="modal" href="#delPhase" >Supprimer Phase</a></li>
			</ul>
		</li>
		<?php
			if($isLot) { // si on a des lots, on affiche les sous projets
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
							echo "<li class=\"divider\"></li>";
						}
						$sqlSousProjet= "SELECT nom
							FROM sousprojet
							WHERE id_lot = '$idLot'";
						$reqSousProjet=mysql_query($sqlSousProjet);
						while($nomSousProjet = mysql_fetch_array($reqSousProjet)) {
							echo "<li><a href=\"#\">Voir ".$nomSousProjet['nom']."</a></li>";
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
					/*<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Phases  <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="#">Voir Phases</a></li>
							<li class="divider"></li>
							<li class="dropdown-header">Action</li>
							<li><a href="#">Ajouter Phase</a></li>
							<li><a href="#">Supprimer Phase</a></li>
						</ul>
					</li>*/
					/*<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Sous-Projets  <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="#">Voir Sous-Projets</a></li>
							<li class="divider"></li>
							<li class="dropdown-header">Action</li>
							<li><a href="#">Ajouter Sous-Projet</a></li>
							<li><a href="#">Supprimer Sous-Projet</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Taches  <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="#">Voir Taches</a></li>
							<li class="divider"></li>
							<li class="dropdown-header">Action</li>
							<li><a href="#">Ajouter Tache</a></li>
							<li><a href="#">Supprimer Tache</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Jalons  <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="#">Voir Jalons</a></li>
							<li class="divider"></li>
							<li class="dropdown-header">Action</li>
							<li><a href="#">Ajouter Jalon</a></li>
							<li><a href="#">Supprimer Jalon</a></li>
						</ul>
					</li>
					
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Livrables  <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="#">Voir Livrables</a></li>
							<li class="divider"></li>
							<li class="dropdown-header">Action</li>
							<li><a href="#">Ajouter Livrable</a></li>
							<li><a href="#">Supprimer Livrable</a></li>
						</ul>
					</li>
					*/ 
					echo "</ul>";
				?>
                
		<form method="POST" class="navbar-form navbar-right" action="delProjet.php">
			<input type = "hidden" name="nameP" value="<?php echo $nameProject;?>">
			<div class=\"form-group\">
			<button class="btn btn-danger btn-xs" name="del" type="submit"><span class="glyphicon glyphicon-plus"></span>    Supprimer ce projet</button>
			</div>
		</form>
	</div>
</nav>