<div class="container" style="margin-top:30px">
    <h1><?=$title?></h1>
    <hr/>

    <?php
        if(file_exists($dirs['scripts'] . "cpep.py"))   {
            $interfaces = getInterfaces();

            foreach ($interfaces as $key=>$interface)    {
				if($key == "eth0")	{
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


     ?>
</div>
