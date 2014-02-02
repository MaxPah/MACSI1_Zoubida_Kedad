<div class="modal fade" id="ValidSupprProjet" style="display: none;" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
		<form method="POST" action="delProjet.php">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<p>Supprimer le projet</p>
			</div>					
			<span id="validSuppr">Voulez vous vraiment supprimer ce projet ? (attention ce choix est définitif)</span>
			<div class="modal-body">
				<div class="form-group">
					<div class="col-lg-10">
						<input type = "hidden" name="nameP" value="<?php echo $nameProject;?>">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
				<button type="submit" class="btn btn-primary" name="del">Supprimer </button>
			</div>
		</form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->