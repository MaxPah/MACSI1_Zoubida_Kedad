<div class="modal fade" id="addJalon" style="display: none;" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
		<form method="POST" action="addJalon.php">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<p>Ajouter un jalon</p>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="lPh" class="control-label">Dans quelle phase ajouter ce jalon ?</label>
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
					
					<label for="nSP" class="control-label">Nom du nouveau jalon</label>
						<input type="text" class="form-control" id="nJ" name="nameJ" placeholder="Tapez le nom du jalon">
					<br/>
					<label for="nSP" class="control-label">Date du jalon</label>
						<input type="date" class="form-control" id="nDa" name="dateJ">
					<br/>
					<label for="nSP" class="control-label">Description</label>
						<input type="text" class="form-control" id="nDesc" name="nDJ" placeholder="Evenement caracteristique">
					
					<input type = "hidden" name="nameP" value="<?php echo $nameProject;?>">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
				<button type="submit" class="btn btn-primary" >Ajouter Jalon</button>
			</div>
		</form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->