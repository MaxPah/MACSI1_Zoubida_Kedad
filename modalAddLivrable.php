<div class="modal fade" id="addLivrable" style="display: none;" aria-hidden="true">
  <div class="modal-dialog" style='margin-right :80%;'>
    <div class="modal-content">
		<form method="POST" action="addLivrable.php">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<p>Ajouter un livrable</p>
			</div>
			<div class="modal-body">
				<div class="form-group">
					
						<label for="nSP" class="control-label">Nom du livrable</label>
						<input type="text" class="form-control" id="nL" name="nameL" placeholder="Tapez le nom du nouveau livrable">
						<br/>
						<input type = "hidden" name="nameP" value="<?php echo $nameProject;?>">
					
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
				<button type="submit" class="btn btn-primary" >Ajouter livrable</button>
			</div>
		</form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->