<div class="container" style="margin-top:30px">
    <h1><?=$title?></h1>
    <hr/>

    <?php
        if(file_exists($dirs['scripts'] . "readIpTables.py"))   {
            $command = "python " . $dirs['scripts'] . "readIpTables.py";
            exec($command, $return=Array(), $returnCode);
            if($returnCode == 0)   {
                $json = file_get_contents($dirs['scripts'] . "rules.json");
                $rules = json_decode($json,true);
                ?>
                    <table class="table table-striped table-bordered table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <td><strong>#</strong></td>
                                <td><strong>Cible</strong></td>
                                <td><strong>Type</strong></td>
                                <td><strong>Adresse source</strong></td>
                                <td><strong>Port source</strong></td>
                                <td><strong>Adresse destination</strong></td>
                                <td><strong>Port destination</strong></td>
                                <td><strong>Protocole</strong></td>
                                <td><strong>État</strong></td>
                                <td><strong>Nombre de paquets</strong></td>
                                <td><strong>Données échangées</strong></td>
                            </tr>
                        </thead>
                        <tbody><?php
                            foreach ($rules as $key=>$rule)    { ?>
                            <tr>
                                <td><?=$key?></td>
                                <td><?=$rule['target']?></td>
                                <td><?=$rule['type']?></td>
                                <td><?=$rule['srcAddr']?></td>
                                <td><?=$rule['srcPort']?></td>
                                <td><?=$rule['destAddr']?></td>
                                <td><?=$rule['destPort']?></td>
                                <td><?=$rule['prot']?></td>
                                <td><?=$rule['state']?></td>
                                <td><?=$rule['pkts']?></td>
                                <td><?=$rule['bytes']?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php
            }
            else {
                echo "Une erreur est survenue lors de la récupération des règles !";
            }
        }
        else {
            echo "Une erreur est survenue !";
        }


     ?>
</div>
