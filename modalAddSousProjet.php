<div class="modal fade" id="addSousProjet" style="display: none;" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
		<form method="POST" action="addSousProjet.php">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<p>Ajouter un sous-projet</p>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="lSP" class="control-label">Dans quel lot ajouter le sous-projet?</label>
					<?php
					echo "<select class=\"form-control\" id=\"lSP\" name=\"nameL\">";
					$sqlLot= "	SELECT nom
						FROM lot
						WHERE id_projet = '$idProject'";
					$reqLot=mysql_query($sqlLot);
					while($nomLot = mysql_fetch_array($reqLot))
					{
						echo "<option>".$nomLot['nom']."</option>";
					}
					echo "</select>";
					?>
					<br/>
					<label for="nSP" class="control-label">Nom du sous-projet</label>
						<input type="text" class="form-control" id="nSP" name="nameSP" placeholder="Tapez le nom du sous-projet">
						<input type = "hidden" name="nameP" value="<?php echo $nameProject;?>">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
				<button type="submit" class="btn btn-primary" >Ajouter sous-projet</button>
			</div>
		</form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->