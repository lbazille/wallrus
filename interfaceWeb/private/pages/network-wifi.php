<div class="container" style="margin-top:30px">
    <h1><?=$title?></h1>
    <hr/>

    <?php
		$wifiConfig = getWifi();
		$interfaces = getInterfaces();

        if(file_exists($dirs['scripts'] . "getWifi.py"))   {


			if (isset($_POST['ssid']) && isset($_POST['wpa_passphrase']))	{
				exec("python3 " . $dirs['scripts'] . "setWifi.py " . $wifiConfig['ssid'] . " " . $_POST['ssid']);
				exec("python3 " . $dirs['scripts'] . "setWifi.py " . $wifiConfig['wpa_passphrase'] . " " . $_POST['wpa_passphrase']);

				echo pannel("success","glyphicon glyphicon-ok","Succès","La configuration WiFi a été modifié ! Un <a href=\"?page=admin-box\">redémarrage</a> est nécessaire");

				$wifiConfig = getWifi();
			}
				?>
				<form method="post">
					<div class="form-group">
						<label for="ssid">SSID : </label>
						<input type="text" class="form-control" id="ssid" name="ssid" placeholder="SSID" value="<?= $wifiConfig['ssid'] ?>" required>
					</div>
					<div class="form-group">
						<label for="wpa_passphrase">Phrase de passe : </label>
						<input type="text" class="form-control" id="wpa_passphrase" name="wpa_passphrase" placeholder="Phrase de passe" value="<?= $wifiConfig['wpa_passphrase'] ?>" required>
					</div>
					<div class="form-group">
						<label for="cryptoMethod">Type de chiffrement : </label>
						<select name="cryptoMethod">
							<option value="wpa2">WPA 2</option>
						</select>
					</div>
					<div class="form-group">
						<label for="cryptoMethod">IP passerelle : </label> <?= $interfaces['wlan0']['address'] ?>
					</div>
					<div class="form-group">
						<label for="cryptoMethod">Masque de sous-réseau : </label> <?= $interfaces['wlan0']['netmask'] ?>
					</div>


					<hr/>
					<div class="form-group">
						<button type="button" class="btn btn-lg btn-secondary"><span class="glyphicon glyphicon-remove"></span> Annuler</button>
						<button type="submit" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-ok"></span> Valider</button>
					</div>
				</form>
				<?php
        }
        else {
            echo "Une erreur est survenue !";
        }


     ?>
</div>
