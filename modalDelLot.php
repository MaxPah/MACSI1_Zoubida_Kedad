<div class="modal fade" id="delLot" style="display: none;" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
		<form method="POST" action="delLot.php">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<p>Supprimer un lot</p>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="dL" class="col-lg-2 control-label">Quel lot voulez-vous supprimer ?</label>
					<div class="col-lg-10">
					<?php
					$sqlIdProject= "	SELECT id_projet
					FROM projet
					WHERE nom = '$nameProject'";
					$reqIdProject=mysql_query($sqlIdProject);
					$idProjectArray= mysql_fetch_array($reqIdProject);
					$idProject=$idProjectArray['id_projet'];
					$sqlLot= "	SELECT nom
					FROM lot
					WHERE id_projet = '$idProject'";
					$reqLot=mysql_query($sqlLot);
					echo "<select class=\"form-control\" id=\"dL\" name=\"nameL\">";
					while($nomLot = mysql_fetch_array($reqLot))
					{
						echo "<option>".$nomLot['nom']."</option>";
					}
					echo "</select>";
					?>
						<input type = "hidden" name="nameP" value="<?php echo $nameProject;?>">
					</div>
				</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
				<button type="submit" class="btn btn-primary" >Supprimer lot</button>
			</div>
		</form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->