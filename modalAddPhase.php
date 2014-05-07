<div class="modal fade" id="addPhase" style="display: none;" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
		<form method="POST" action="addPhase.php">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<p>Ajouter une phase</p>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="nPh" class="control-label">Nom de la phase</label>
					
					
						<input type="text" class="form-control" id="nPh" name="namePh" placeholder="Tapez le nom de la phase">
						<input type = "hidden" name="nameP" value="<?php echo $nameProject;?>">
					
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
				<button type="submit" class="btn btn-primary" >Ajouter phase</button>
			</div>
		</form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->