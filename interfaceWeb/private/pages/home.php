    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?=$title?></h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
<!--        <div class="row">
            <div class="col-lg-6">-->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Statistiques sur l'équipement
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <p>Vous trouverez ci-dessous toutes les informations utiles concernant votre box.</p>
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                    <tr>
                                        <td><strong>État de la connexion</strong></td>
                                        <td><?=$app['productName']?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Version du logiciel</strong></td>
                                        <td><?=$app['version']?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Uptime</strong></td>
                                        <td><?=uptime()?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Utilisation CPU</strong></td>
                                        <td>
                                            <div class="row" style="margin-left:0; margin-right:0;">
                                                <div class="col-sm-10" style="padding-left:0">
                                                    <div class="progress" style="margin-bottom:0">
                                                        <div class="progress-bar" role="progressbar" aria-valuenow="<?=sys_getloadavg()[0] * 100?>" aria-valuemin="0" aria-valuemax="100" style="width:<?=sys_getloadavg()[0] * 100?>%"></div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <?=sys_getloadavg()[0] * 100 . "%"?>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Utilisation RAM</strong></td>
                                        <td><?= memory_get_usage(true)/1000000000 ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
