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
					<label for="dL" class="control-label">Quel lot voulez-vous supprimer ?</label>
					<div class="col-lg-10">
					<?php
						$sqlLot= "	SELECT nom,id_lot
									FROM lot
									WHERE id_projet =".$_SESSION['idProject'] ;
						$reqLot=mysql_query($sqlLot);
						echo "<select class=\"form-control\" id=\"dL\" name=\"idL\">";
						while($nomLot = mysql_fetch_array($reqLot))
						{
							echo "<option>".$nomLot['nom']."-".$nomLot['id_lot']."</option>";
						}
						echo "</select>";
					?>
					</div>
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