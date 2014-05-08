<div class="modal fade" id="delPhase" style="display: none;" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
		<form method="POST" action="delPhase.php">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<p>Supprimer une phase</p>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="dPh" class="col-lg-2 control-label">Quelle phase voulez-vous supprimer ?</label>
					<div class="col-lg-10">
					<?php
					$sqlPhase= "	SELECT nom,id_phase
					FROM phase
					WHERE id_projet = '$idProject'";
					$reqPhase=mysql_query($sqlPhase);
					echo "<select class=\"form-control\" id=\"dPh\" name=\"idPh\">";
					while($nomPhase = mysql_fetch_array($reqPhase))
					{
						echo "<option>".$nomPhase['nom']."-".$nomPhase['id_phase']."</option>";
					}
					echo "</select>";
					?>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
				<button type="submit" class="btn btn-primary" >Supprimer phase</button>
			</div>
		</form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->