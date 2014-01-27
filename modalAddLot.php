<div class="modal fade" id="addLot" style="display: none;" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
		<form method="POST" action="addLot.php">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<p>Ajouter un lot</p>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="nL" class="col-lg-2 control-label">Nom du lot</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="nL" name="nameL" placeholder="Tapez le nom du lot">
						<input type = "hidden" name="nameP" value="<?php echo $nameProject;?>">
					</div>
				</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
				<button type="submit" class="btn btn-primary" >Ajouter lot</button>
			</div>
		</form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->