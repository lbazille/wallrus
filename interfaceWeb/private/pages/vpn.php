<div class="container" style="margin-top:30px">
    <h1><?=$title?></h1>
    <hr/>

    <?php
        if(file_exists($dirs['scripts'] . "cpep.py"))   {
            exec("python3 " . $dirs['scripts'] . "cpep.py", $return);
            $json = "";
            foreach($return as $value)  {
                $json .= $value;
            }
            $interfaces = json_decode($json,true);

            if (isset($interfaces['ppp0']))	{ ?>
				<h2><span class="label label-success"><span class="glyphicon glyphicon-ok"></span> OK</span></h2> La connexion avec le centre de données Wallrus est fonctionnelle.
				<?php

				if(file_exists($dirs['scripts'] . "cpep.py"))   {
		            $interfaces = getInterfaces();

		            foreach ($interfaces as $key=>$interface)    {
						if($key == "ppp0")	{
			                ?>
			                <table class="table table-striped table-bordered table-hover">
			                    <tbody>
			                        <tr style="max-width:100px">
			                            <td><strong>Nom de l'interface</strong></td>
			                            <td><?= $key ?></td>
			                        </tr>
			                        <tr>
			                            <td><strong>Adresse IP</strong></td>
			                            <td><?= $interface['address'] ?></td>
			                        </tr>
			                        <tr>
			                            <td><strong>Adresse MAC</strong></td>
			                            <td><?= $interface['netmask'] ?></td>
			                        </tr>
			                    </tbody>
			                </table>
							<?php
						}
		            }
		        }
		        else {
		            echo "Une erreur est survenue !";
		        }
			}
			else	{ ?>
				<h2><span class="label label-danger"><span class="glyphicon glyphicon-remove"></span> KO</span></h2>La connexion avec le centre de données Wallrus est disfonctionnelle.
			<?php }
        }
        else {
            echo "Une erreur est survenue !";
        }


     ?>
</div>
