<?php
    session_start();

    $title = 'Inscription';
    include('dist/include/html/head.php');
    include('dist/include/html/navigation.php');

    include('dist/fonctions/connect.php');
    $idc = connect();

    $div_error = '';

    if(!empty($_POST['nom']) OR !empty($_POST['prenom']) OR !empty($_POST['pseudo']) OR !empty($_POST['mail']) OR !empty($_POST['mdp']) OR !empty($_POST['confirm_mdp']))
    {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $pseudo = $_POST['pseudo'];
        $mail = $_POST['mail'];
        $mdp = $_POST['mdp'];
        $confirm_mdp = $_POST['confirm_mdp'];
        $nb_error = 0;
        $error = '';

        $sql_select_mail = "SELECT us_mail, us_id
            FROM t_utilisateur";
        $rs_select_mail = pg_query($idc, $sql_select_mail);
        while($un_mail = pg_fetch_assoc($rs_select_mail))
        {
            if($un_mail['us_mail'] == $mail)
            {
                $nb_error = $nb_error +1;
                $error .= "Le mail que vous avez saisi est déjà pris. ";
            }
            if($un_mail['us_id'] == $pseudo)
            {
                $nb_error = $nb_error +1;
                $error .= "Le pseudo que vous avez saisi est déjà pris. ";
            }
        }
        if($mdp != $confirm_mdp)
        {
            $nb_error = $nb_error +1;
            $error .= 'Vos mots de passe ne correspondent pas. ';
        }
        if($nb_error > 0)
        {
            $div_error = '<div class="alert alert-danger" role="alert">
                <strong>Attention</strong> '.$error.'
            </div>';
        }
        else
        {
            $sql_insert_user = "INSERT INTO t_utilisateur(us_nom, us_prenom, us_id, us_mail, us_mdp, us_acces)
                VALUES ('".$nom."', '".$prenom."', '".$pseudo."', '".$mail."', '".md5($mdp)."', 'FALSE');";
            $rs_insert_user = pg_query($idc, $sql_insert_user);

            $div_error = '<div class="alert alert-info" role="alert">
                <strong>Success</strong> Votre compte RoadLife a bien été créé. Vous pourrez vous connecter des que l\'équipe RoadLife aura valider vos informations.
            </div>';
        }
    }

    echo('<div class="row" id="css-rdl-body">
        <div class="col-lg-4 css-rdl-divCenter">
            <div class="text-center"><h3>Créer un compte RoadLife</h3></div>
            <hr class="style14"> <br />
            <div class="css-rdl-alert">'.$div_error.'</div>
            <form action="subscribe.php" method="post" accept-charset="utf-8">
                <div class="col-auto">
                    <label class="sr-only" for="inlineFormInputGroup">prenom</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-user"></i></div>
                        </div>
                        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Prénom" name="prenom" required />
                    </div>
                </div>
                <div class="col-auto">
                    <label class="sr-only" for="inlineFormInputGroup">nom</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-user"></i></div>
                        </div>
                        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Nom" name="nom" required />
                    </div>
                </div>
                <div class="css-rdl-justify">
                    <small><i class="fas fa-question-circle"></i> Le pseudo ne peut contenir que des chiffres et des lettres.</small>
                </div>
                <div class="col-auto">
                    <label class="sr-only" for="inlineFormInputGroup">pseudo</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-user-tag"></i></div>
                        </div>
                        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Pseudo" name="pseudo" required pattern="[a-zA-Z]+$" />
                    </div>
                </div>
                <div class="col-auto">
                    <label class="sr-only" for="inlineFormInputGroup">mail</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-at"></i></div>
                        </div>
                        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="E-mail" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name="mail" />
                    </div>
                </div>
                <div class="css-rdl-justify">
                    <small><i class="fas fa-question-circle"></i> Le mot de passe doit contenir entre 6 et 20 caractères.</small>
                </div>
                <div class="col-auto">
                    <label class="sr-only" for="inlineFormInputGroup">password</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-lock"></i></div>
                        </div>
                        <input type="password" class="form-control" id="inlineFormInputGroup" placeholder="Mot de passe" required minlength="6" maxlength="20" name="mdp" /> 
                    </div>
                </div>
                <div class="col-auto">
                    <label class="sr-only" for="inlineFormInputGroup">confirm_password</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-lock"></i></div>
                        </div>
                        <input type="password" class="form-control" id="inlineFormInputGroup" placeholder="Confirmation mot de passe" required minlength="6" maxlength="20" name="confirm_mdp" />
                    </div>
                </div>
                <br/>
                <input type="submit" name="submit_button" value="S\'inscrire" class="btn btn-info formbutton" id="submit_button"/> 
                <input type="reset" value="Annuler" class="btn btn-info"/>
            </form>
        </div>
    </div>');
    
    include('dist/include/html/footer.php');
    include('dist/include/html/script.php');
?>