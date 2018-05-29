    <div class="container" style="margin-top:30px">
        <h1>Modifier le mot de passe</h1>
        <?php
            if(isset($_POST['oldPass']) && isset($_POST['newPass1']) && isset($_POST['newPass2']))    {
                // Verifying the current password
                if (login("admin",$_POST['oldPass']))   {
                    if($_POST['newPass1'] == $_POST['newPass2'])    {
                        if($_POST['newPass1'] != $_POST['oldPass'])  {
                            if(strlen($_POST['newPass1']) >= 5)  {
                                if (changePwd("admin",$_POST['newPass1']))  {
                                    $success = 1;
                                }
                                else {
                                    $error = 5;
                                }
                            }
                            else {
                                $error = 4;
                            }
                        }
                        else {
                            $error = 3;
                        }
                    }
                    else {
                        $error = 2;
                    }
                }
                else {
                    $error = 1;
                }
            }
            $errorMsg = ['1' => 'Ancien mot de passe incorrect','2' => 'Les mots de passe ne correspondent pas','3' => 'Le nouveau mot de passe est identique à l\'ancien !','4' => 'Le mot de passe est trop court','5' => 'Une erreur de connexion a la BDD est survenue'];
        ?>
        <?php
        if(isset($error)) {
            echo pannel("danger","glyphicon glyphicon-remove","Erreur",$errorMsg[$error]);
        }
        if(isset($success)) {
            echo pannel("success","glyphicon glyphicon-ok","Succès","Votre mot de passe a été modifié !");
        } ?>
        <hr/>
        <p>Vous pouvez utiliser cette page afin de modifier le mot de passe de l'administrateur :</p>
        <form method="post">
            <div class="form-group">
                <label for="oldPass">Ancien mot de passe : </label>
                <input type="password" class="form-control" id="oldPass" name="oldPass" placeholder="Ancien mot de passe" required>
            </div>
            <hr/>
            <div class="form-group">
                <label for="oldPass">Nouveau mot de passe : </label>
                <input type="password" class="form-control" id="newPass1" name="newPass1" placeholder="Nouveau mot de passe" required>
            </div>
            <div class="form-group">
                <label for="oldPass">Confirmer le nouveau mot de passe : </label>
                <input type="password" class="form-control" id="newPass2" name="newPass2" placeholder="Confirmation" required>
            </div>
            <hr/>
            <div class="form-group">
                <button type="button" class="btn btn-lg btn-secondary"><span class="glyphicon glyphicon-remove"></span> Annuler</button>
                <button type="submit" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-ok"></span> Valider</button>
            </div>
        </form>
    </div>
