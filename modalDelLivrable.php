<div class="modal fade" id="delLivrable" style="display: none;" aria-hidden="true">
  <div class="modal-dialog">
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
												
						$sqlLivrable= "	SELECT nom,id_livrable
										FROM livrable
										WHERE id_projet = ".$_SESSION['idProject'];
						$reqLivrable=mysql_query($sqlLivrable);
						echo "<select class=\"form-control\" id=\"dL\" name=\"idL\">";
						while($nomLivrable = mysql_fetch_array($reqLivrable))
						{
							echo "<option>".$nomLivrable['nom']."-".$nomLivrable['id_livrable']."</option>";
						}
						echo "</select>";
					?>
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