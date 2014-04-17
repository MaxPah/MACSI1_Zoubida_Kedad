<div class="modal fade" id="delJalon" style="display: none;" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
		<form method="POST" action="delJalon.php">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<p>Supprimer un jalon</p>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="dSP" class="control-label">Quel jalon voulez-vous supprimer ?</label>
					<?php
					$sqlSP= "	SELECT nom
								FROM jalon
								WHERE id_projet = '$idProject'";
					$reqSP=mysql_query($sqlSP);
					echo "<select class=\"form-control\" id=\"dSP\" name=\"nameJ\">";
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
				<button type="submit" class="btn btn-primary" >Supprimer jalon</button>
			</div>
		</form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->