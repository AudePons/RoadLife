<?php
    session_start();

    include('dist/fonctions/connect.php');
    $idc = connect();

    $title = 'Profil';
    include('dist/include/html/head.php');
    include('dist/include/html/navigation.php');

    $div_error = '';
    $nb_error = 0;
    $error = '';

    if(!empty($_POST['nom']) OR !empty($_POST['prenom']) OR !empty($_POST['mail']))
    {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $mail = $_POST['mail'];

        $sql_select_mdp = "SELECT us_mdp
            FROM t_utilisateur
            WHERE us_num = '".$_SESSION['us_num']."';";
        $rs_select_mdp = pg_query($idc, $sql_select_mdp);
        $un_mdp = pg_fetch_assoc($rs_select_mdp);

        if(empty($nom))
        {
            $nb_error = $nb_error +1;
            $error .= 'Le champ <strong>Nom</strong> est obligatoire. ';
        }
        if(empty($prenom))
        {
            $nb_error = $nb_error +1;
            $error .= 'Le champ <strong>Prénom</strong> est obligatoire. ';
        }
        if(empty($mail))
        {
            $nb_error= $nb_error +1;
            $error .= 'Le champ <strong>E-mail</strong> est obligatoire. ';
        }
        if(!empty($_POST['actuel_mdp']))
        {
            if($un_mdp['us_mdp'] != md5($_POST['actuel_mdp']))
            {
                $nb_error = $nb_error +1;
                $error .= 'Votre <strong>mot de passe</strong> actuel est incorrect. ';
            }
            if(empty($_POST['nouveau_mdp']))
            {
                $nb_error = $nb_error +1;
                $error .= 'En cas de changement de mot de passe, la <strong>saisie du nouveau mot de passe</strong> est obligatoire. ';
            }
        }
        
        if($nb_error > 0)
        {
            $div_error = '<div class="alert alert-danger" role="alert">
                 <strong>Attention</strong> '.$error.'
            </div>';
        }
        else
        {
            if(!empty($_POST['nouveau_mdp']) && $_POST['nouveau_mdp'] != '')
            {
                $sql_update_user = "UPDATE t_utilisateur
                    SET us_nom = '".$nom."',
                    us_prenom = '".$prenom."',
                    us_mail = '".$mail."',
                    us_mdp = '".md5($_POST['mdp'])."'
                    WHERE us_num = ".$_SESSION['us_num'].";";
                $rs_update_user = pg_query($idc, $sql_update_user);
            }
            else
            {
                $sql_update_user = "UPDATE t_utilisateur
                    SET us_nom = '".$nom."',
                    us_prenom = '".$prenom."',
                    us_mail = '".$mail."'
                    WHERE us_num = ".$_SESSION['us_num'].";";
                $rs_update_user = pg_query($idc, $sql_update_user);
            }

            $_SESSION['us_nom'] = $nom;
            $_SESSION['us_prenom'] = $prenom;
            $_SESSION['us_mail'] = $mail;

            $div_error = '<div class="alert alert-info" role="alert">
                 <strong>Success</strong> Vos informations ont bien été modifiées.
            </div>';
        }
    }

    echo('<div class="row" id="css-rdl-body">
        <div class="col-lg-4 css-rdl-divCenter">
            <div class="text-center"><h3>Modifier mon compte RoadLife</h3></div>
            <hr class="style14"> <br />
            <div class="css-rdl-alert">'.$div_error.'</div>
            <div class="text-left">
                <div class="alert alert-info" role="alert">
                    <strong>UTILISATEUR : </strong> '.$_SESSION['us_prenom'].' '.$_SESSION['us_nom'].' <br/>
                    <strong>PSEUDO : </strong> '.$_SESSION['us_id'].'
                </div>
            </div>
            <hr class="style14"> <br />
            <form action="profil.php" method="post">
                <input type="text"  name="nom" pattern="[a-zA-Zéèç-]{1,15}" required placeholder="Nom" value="'.$_SESSION['us_nom'].'" class="form-control css-rdl-inputCenter col-lg-8"/>
                <input type="text"  name="prenom" pattern="[a-zA-Zéèç-]{1,15}" required placeholder="Prénom" value="'.$_SESSION['us_prenom'].'" class="form-control css-rdl-inputCenter col-lg-8"/>
                <input type="password"  name="actuel_mdp" id="tel" placeholder="Mot de passe actuel" class="form-control css-rdl-inputCenter col-lg-8"/>
                <input type="password"  name="nouveau_mdp" placeholder="Nouveau mot de passe" class="form-control css-rdl-inputCenter col-lg-8"/>
                <input type="mail"  name="mail" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$" required placeholder="E-mail" value="'.$_SESSION['us_mail'].'" class="form-control css-rdl-inputCenter col-lg-8"/>
                <br/><input type="submit" value="Modifier" class="btn btn-info"> <input type="reset" value="Annuler" class="btn btn-info"/>
            </form>
        </div>
    </div>');

    include('dist/include/html/footer.php');
    include('dist/include/html/script.php');
?>