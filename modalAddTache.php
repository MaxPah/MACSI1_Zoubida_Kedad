<div class="modal fade" id="addTache" style="display: none;" aria-hidden="true">
  <div class="modal-dialog" style='margin-right :80%;'>
    <div class="modal-content">
		<form method="POST" action="addTache.php">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<p>Ajouter une t&acirc;che</p>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="lPh" class="control-label">Dans quelle phase ajouter cette t&acirc;che ?</label>
					<?php
						echo "<select class=\"form-control\" id=\"lPh\" name=\"namePh\">";
						
						$sqlPhase= "	SELECT nom
										FROM phase
										WHERE id_projet = '$idProject'";
										
						$reqPhase=mysql_query($sqlPhase);
						
						while($nomPhase = mysql_fetch_array($reqPhase))
						{
							echo "<option>".$nomPhase['nom']."</option>";
						}
						echo "</select>";
					?>
					<br/>
					<label for="lSP" class="control-label">Dans quel sous-projet ajouter cette t&acirc;che ?</label>
					<?php
						echo "<select class=\"form-control\" id=\"lSP\" name=\"nameSP\">";
						
						$sqlSP= "		SELECT s.nom
										FROM sousprojet s, lot l
										WHERE s.id_lot= l.id_lot 
										AND l.id_projet = '$idProject'";
										
						$reqSP=mysql_query($sqlSP);
						
						while($nomSP = mysql_fetch_array($reqSP))
						{
							echo "<option>".$nomSP['nom']."</option>";
						}
						echo "</select>";
					?>
					<br/>
					<label for="nSP" class="control-label">Nom de la nouvelle t&acirc;che</label>
						<input type="text" class="form-control" id="nT" name="nameT" placeholder="Tapez le nom de la t&acirc;che">
					<br/>	
					<label for="nSP" class="control-label">Co&ucirc;t de la t&acirc;che</label>
						<input type="text" class="form-control" id="nCout" name="coutT" placeholder="Tapez le co&ucirc;t de la t&acirc;che">
					<br/>
					<label for="nSP" class="control-label">Date de d&eacute;but au plus t&ocirc;t de la t&acirc;che</label>
						<input type="date" class="form-control" id="nDDTO" name="ddtoT">
					<br/>
					<label for="nSP" class="control-label">Date de d&eacute;but au plus tard de la t&acirc;che</label>
						<input type="date" class="form-control" id="nDDTA" name="ddtaT">
					<br/>
					<label for="nSP" class="control-label">Date de fin au plus t&ocirc;t de la t&acirc;che</label>
						<input type="date" class="form-control" id="nDFTO" name="dftoT">
					<br/>
					<label for="nSP" class="control-label">Date de fin au plus tard de la t&acirc;che</label>
						<input type="date" class="form-control" id="nDFTA" name="dftaT">
					<br/>
					<label for="nSP" class="control-label">Objectif de la t&acirc;che</label>
						<input type="text" class="form-control" id="nObj" name="objT" placeholder="Tapez l'objectif de la t&acirc;che">
					<br/>
					<label for="nSP" class="control-label">Dur&eacute;e de la t&acirc;che</label>
						<input type="text" class="form-control" id="nDuree" name="dureeT" placeholder="Tapez la dur&eacute;e de la t&acirc;che">
					<br/>
					<label for="nSP" class="control-label">Nombre de journ&eacute;es hommes n&eacute;cessaires pour cette t&acirc;che</label>
						<input type="text" class="form-control" id="nJH" name="jhT" placeholder="Entrez le nombre de journ&eacute;es hommes n&eacute;cessaires">
					
					<input type = "hidden" name="nameP" value="<?php echo $nameProject;?>">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
				<button type="submit" class="btn btn-primary" >Ajouter T&acirc;che</button>
			</div>
		</form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->