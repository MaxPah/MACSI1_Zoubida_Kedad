<div class="modal fade" id="delLivrable" style="display: none;" aria-hidden="true">
  <div class="modal-dialog" style='margin-right :80%;'>
    <div class="modal-content">
		<form method="POST" action="delLivrable.php">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<p>Supprimer un livrable</p>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="dL" class="col-lg-2 control-label">Quel livrable voulez-vous supprimer ?</label>
					<div class="col-lg-10">
					<?php
						$sqlIdProject= "SELECT id_projet
										FROM projet
										WHERE nom = '$nameProject'";
						$reqIdProject=mysql_query($sqlIdProject);
						$idProjectArray= mysql_fetch_array($reqIdProject);
						$idProject=$idProjectArray['id_projet'];
						
						$sqlLivrable= "	SELECT nom
										FROM livrable
										WHERE id_projet = '$idProject'";
						$reqLivrable=mysql_query($sqlLivrable);
						echo "<select class=\"form-control\" id=\"dL\" name=\"nameL\">";
						while($nomLivrable = mysql_fetch_array($reqLivrable))
						{
							echo "<option>".$nomLivrable['nom']."</option>";
						}
						echo "</select>";
					?>
						<input type = "hidden" name="nameP" value="<?php echo $nameProject;?>">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
				<button type="submit" class="btn btn-primary" >Supprimer Livrable</button>
			</div>
		</form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->