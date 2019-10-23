<?php
    session_start();

    $title = 'RoadLife';
    include('dist/include/html/head.php');
    include('dist/include/html/navigation.php');

    include('dist/fonctions/connect.php');
    $idc = connect();

    $div_error = '';

    if(!empty($_POST['pseudo']) OR !empty($_POST['mdp']))
    {
        $pseudo = $_POST['pseudo'];
        $the_mdp = md5(pg_escape_string($idc, $_POST['mdp']));
        
        $sql_select_user = "SELECT us_num, us_id, us_mail, us_nom, us_prenom, us_mdp, us_acces
            FROM t_utilisateur
            WHERE us_id = '".$pseudo."';";
        $rs_select_user = pg_query($idc, $sql_select_user);
        $un_user = pg_fetch_assoc($rs_select_user);

        if(empty($un_user['us_num']) OR $un_user['us_mdp'] != $the_mdp OR  $un_user['us_acces'] != 't')
        {
            $div_error = '<div class="alert alert-danger" role="alert">
                 <strong>Attention ! </strong> Votre compte RoadLife n\'a peut être pas été activé par notre équipe, ou vos identifiants sont incorrects.
            </div>';
        }
        elseif($un_user['us_mdp'] == $the_mdp && $un_user['us_acces'] == 't')
        {
            $_SESSION['us_num'] = $un_user['us_num'];
            $_SESSION['us_nom'] = $un_user['us_nom'];
            $_SESSION['us_id'] = $un_user['us_id'];
            $_SESSION['us_prenom'] = $un_user['us_prenom'];
            $_SESSION['us_mail'] = $un_user['us_mail'];
            $_SESSION['us_acces'] = $un_user['us_acces'];

            header('Location: index.php');
            exit();
        }
    }

    // if(isset($_SESSION["us_num"]) && (int)$_SESSION["us_num"] > 0 )
    if(!empty($_SESSION['us_num']))
    {   
        $sql_sp='SELECT sp_id, sp_libelle FROM t_siteprod';
        $rs_sp=pg_exec($idc,$sql_sp);
    
        echo('<div class="row" id="map">
            <div id="toolbar">
                <button id="ees" class="btn btn-primary" onclick="masquer_div(\'form_interface\');"><i class="fab fa-wpforms"></i></button>
                <button id="chauffeur_seul" class="btn btn-dark" style="margin-right:50px;"><i class="fas fa-user"></i></button>
                
				<button id="site_prod" class="btn btn-dark" ><i class="fas fa-building"></i></button>
				<button id="chauffeurs" class="btn btn-dark" ><i class="fas fa-users"></i></button>
                <a href="dist/action/ficheXML.php" download="ficheXML"><button id="Exporter la fiche" class="btn btn-dark"><i class="fas fa-download"></i></button> </a>
                
                <a href="javascript:history.go(0)" style="margin-left:50px;"><button id="Exporter la fiche" class="btn btn-danger"><i class="fas fa-eraser"></i></button></a>
			</div>
        </div>
        <div id ="form_interface">
			<form name="frm" method="get" action="dist/action/ajax/liste_chauffeurs.php">
				<select name="zl_sp" onchange="synchro_lst()" class="form-control">
					<option value="0">Sélectionner un site</option>');
					while($ligne_sp=pg_fetch_assoc($rs_sp))
					{
						echo('<option value="'.$ligne_sp['sp_id'].'">'.$ligne_sp['sp_libelle'].'</option>');
					}
			    echo('</select> <br />
					<div id="resultat"></div>
			</form>
		</div>');
    }
    else
    {
        
        echo('<div class="row" id="css-rdl-body">
            <div class="col-lg-4 css-rdl-divCenter">
                <div class="text-center"><h3>Se connecter à un compte RoadLife</h3></div>
                <hr class="style14"> <br />
                <div class="css-rdl-alert">'.$div_error.'</div>
                <form action="index.php" method="post">
                    <div class="col-auto">
                        <label class="sr-only" for="inlineFormInputGroup">Pseudo</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user-tag"></i></div>
                            </div>
                            <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Pseudo" name="pseudo" />
                        </div>
                    </div>
                    <div class="col-auto">
                        <label class="sr-only" for="inlineFormInputGroup">password</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-lock"></i></i></div>
                            </div>
                            <input type="password" class="form-control" id="inlineFormInputGroup" placeholder="Mot de passe" name="mdp" />
                        </div>
                    </div>
                    <br />
                    <input type="submit" value="Se connecter" class="btn btn-info">
                </form>
            </div>
        </div>');
    }
    
    include('dist/include/html/footer.php');
    include('dist/include/html/script.php');
?>