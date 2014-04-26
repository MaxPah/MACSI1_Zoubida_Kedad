<div class="modal fade" id="delTache" style="display: none;" aria-hidden="true">
  <div class="modal-dialog" style='margin-right :80%;'>
    <div class="modal-content">
		<form method="POST" action="delTache.php">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<p>Supprimer une tache</p>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="dSP" class="control-label">Quelle tache voulez-vous supprimer ?</label>
					<?php
					$sqlSP= "	SELECT t.nom
								FROM tache t, phase p
								WHERE p.id_projet = '$idProject'
								AND t.id_phase = p.id_phase";
					$reqSP=mysql_query($sqlSP);
					echo "<select class=\"form-control\" id=\"dSP\" name=\"nameT\">";
					while($nomSP = mysql_fetch_array($reqSP))
					{
						echo "<option>".$nomSP['nom']."</option>";
					}
					echo "</select>";
					?>					
						<input type = "hidden" name="nameP" value="<?php echo $nameProject;?>">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
				<button type="submit" class="btn btn-primary" >Supprimer tache</button>
			</div>
		</form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->