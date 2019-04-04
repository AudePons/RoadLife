<?php
    session_start();

    include('dist/fonctions/connect.php');
    $idc = connect();

    $title = 'Gestion Inscriptions';
    include('dist/include/html/head.php');
    include('dist/include/html/navigation.php');

    $div_error_1 = '';
    $div_error_2 = '';

    if(!empty($_POST['l_valide']) AND $_POST['l_valide'] > 0)
    {
        $sql_validate = "UPDATE t_utilisateur
            SET us_acces = 'TRUE'
            WHERE us_num = ".$_POST['l_valide'].";";
        $rs_validate = pg_query($idc, $sql_validate);

        $div_error_1 = '<div class="alert alert-info" role="alert">
            <strong>Succes ! </strong> Le compte a bien été activé. L\'utilisateur dispose à présent de tout ses droits.
        </div>';
    }

    if(!empty($_POST['l_ban']) AND $_POST['l_ban'] > 0)
    {
        $sql_ban = "UPDATE t_utilisateur
            SET us_acces = 'FALSE'
            WHERE us_num = ".$_POST['l_ban'].";";
        $rs_ban = pg_query($idc, $sql_ban);

        $div_error_2 = '<div class="alert alert-info" role="alert">
            <strong>Succes ! </strong> Le compte a bien été désactivé. L\'utilisateur ne dispose plus de l\'accés à l\'application.
        </div>';
    }

    // Comptes à valider
    $sql_to_validate = "SELECT us_num, us_prenom, us_nom, us_id, us_mail
        FROM t_utilisateur
        WHERE us_num <> 1
        AND us_acces IS FALSE;";
    $rs_to_validate = pg_query($idc, $sql_to_validate);

    // Comptes à suspendre
    $sql_to_ban = "SELECT us_num, us_prenom, us_nom, us_id, us_mail
        FROM t_utilisateur
        WHERE us_num <> 1
        AND us_acces IS TRUE;";
    $rs_to_ban = pg_query($idc, $sql_to_ban);

    echo('<div class="row" id="css-rdl-body">
        <div class="row css-rdl-divCenter-transp css-rdl-gestion-sub"><br/>
            <div class="col-lg-12 css-rdl-config css-rdl-expli">
                <h3 class="text-center">Gestion des comptes RoadLife</h3>
                <hr class="style14"> <br />
                <div class="text-justify">
                    <i class="fas fa-question-circle"></i> Grâce à cet outil, l\'administrateur a la possibilité de gérer les comptes utilisateurs de RoadLife. Il est possibile de valider un compte ou de suspendre un compte. Il est important de savoir que lorsqu\'un compte est validé, l\'utilisateur a acces aux différents espaces de l\'application, au contraire de la suspension.
                </div>
            </div>
            <div class="col-lg-5 css-rdl-config">
                <h3 class="text-center"><i class="fas fa-check-circle"></i> Valider un compte</h3>
                <hr class="style14"> <br />
                <div class="css-rdl-alert">'.$div_error_1.'</div>
                <form method="post" action="gestion_sub.php">
                    <div class="col-auto">
                        <label class="sr-only" for="inlineFormInputGroup">valide</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-check-circle"></i></div>
                            </div>
                            <select class="form-control" name="l_valide">
                                <option value="0">Sélectionner un compte</option>');
                                while($to_validate = pg_fetch_assoc($rs_to_validate))
                                {
                                    echo('<option value="'.$to_validate['us_num'].'">'.$to_validate['us_id'].' - '.$to_validate['us_mail'].'</option>');
                                }
                            echo('</select>
                        </div>
                    </div>
                    <br/>
                    <div class="text-center">
                        <input type="submit" name="submit_button" value="Activer" class="btn btn-info formbutton" id="submit_button"/>
                    </div>
                </form>
            </div>
            <div class="col-lg-2"></div>
            <div class="col-lg-5 css-rdl-config">
                <h3 class="text-center"><i class="fas fa-times-circle"></i> Suspendre un compte</h3>
                <hr class="style14"> <br />
                <div class="css-rdl-alert">'.$div_error_2.'</div>
                <form method="post" action="gestion_sub.php">
                    <div class="col-auto">
                        <label class="sr-only" for="inlineFormInputGroup">valide</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-times-circle"></i></div>
                            </div>
                            <select class="form-control" name="l_ban">
                                <option value="0">Sélectionner un compte</option>');
                                while($to_ban = pg_fetch_assoc($rs_to_ban))
                                {
                                    echo('<option value="'.$to_ban['us_num'].'">'.$to_ban['us_id'].' - '.$to_ban['us_mail'].'</option>');
                                }
                            echo('</select>
                        </div>
                    </div>
                    <br/>
                    <div class="text-center">
                        <input type="submit" name="submit_button" value="Désactiver" class="btn btn-info formbutton" id="submit_button"/>
                    </div>
                </form>
            </div>
        </div>
    </div>');
 
    include('dist/include/html/footer.php');
    include('dist/include/html/script.php');

?>