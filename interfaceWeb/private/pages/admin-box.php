<div class="container" style="margin-top:30px">
    <h1><?=$title?></h1>
    <hr/>

    <?php
		if (isset($_POST['action']))	{
			if($_POST['action'] == "reboot")	{
				exec("sudo reboot");
				echo "Redémarrage en cours...";
			}
			else if($_POST['action'] == "halt")	{
				exec("sudo shutdown now");
				echo "Arrêt en cours...";
			}
			else {
				echo "Une erreur est survenue !";
			}
		}
		else {
			?>
			<form method="post">
				<div class="form-group">
					<label for="action">Action à effectuer : </label>
					<select name="action">
						<option value="reboot" selected>Redémarrage</option>
						<option value="halt">Arrêt</option>
					</select>
				</div>
				<div class="form-group">
					<button type="button" class="btn btn-lg btn-secondary"><span class="glyphicon glyphicon-remove"></span> Annuler</button>
					<button type="submit" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-ok"></span> Valider</button>
				</div>
			</form>
			<?php
    	}
    	?>
</div>
