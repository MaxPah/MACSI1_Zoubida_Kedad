<div class="modal fade" id="delPhase" style="display: none;" aria-hidden="true">
  <div class="modal-dialog" style='margin-right :80%;'>
    <div class="modal-content">
		<form method="POST" action="delPhase.php">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<p>Supprimer une phase</p>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="dPh" class="control-label">Quelle phase voulez-vous supprimer ?</label>
					<div class="col-lg-10">
					<?php
					$sqlPhase= "	SELECT nom
					FROM phase
					WHERE id_projet = '$idProject'";
					$reqPhase=mysql_query($sqlPhase);
					echo "<select class=\"form-control\" id=\"dPh\" name=\"namePh\">";
					while($nomPhase = mysql_fetch_array($reqPhase))
					{
						echo "<option>".$nomPhase['nom']."</option>";
					}
					echo "</select>";
					?>
						<input type = "hidden" name="nameP" value="<?php echo $nameProject;?>">
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