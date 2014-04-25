<div class="modal fade" id="addRessource" style="display: none;" aria-hidden="true">
  <div class="modal-dialog" style='margin-right :80%;'>
    <div class="modal-content">
		<form method="POST" action="addRessource.php">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<p>Ajouter une ressource</p>
			</div>
			<div class="modal-body">
				<div class="form-group">
					
						<label for="nSP" class="control-label">Nom de la ressource</label>
						<input type="text" class="form-control" id="nL" name="nameRess" placeholder="Tapez le nom de la ressource">
						<br/>
						<label for="nSP" class="control-label">Qualification</label>
						<input type="text" class="form-control" id="nL" name="nameQual" placeholder="Tapez la qualification">
						<br/>
						<label for="nSP" class="control-label">Co&ucirc;t de la ressource</label>
						<input type="text" class="form-control" id="nL" name="nameCout" placeholder="Tapez le cout">
						<br/>
						<label for="nSP" class="control-label">Type de la ressource</label>
						<select class="form-control" id="lPh" name="nameType">
							<option>materielle</option>
							<option>humaine</option>
							<option>logicielle</option>
						</select>

					<input type = "hidden" name="nameP" value="<?php echo $nameProject;?>">
					
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
				<button type="submit" class="btn btn-primary" >Ajouter ressource</button>
			</div>
		</form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->