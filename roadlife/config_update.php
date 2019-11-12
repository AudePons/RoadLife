<?php
session_start();

include('dist/fonctions/connect.php');
$idc = connect();

$title = 'Panneau de configuration';
include('dist/include/html/head.php');
include('dist/include/html/navigation.php');

?>
<div class="row" id="css-rdl-body">
    <div class="row css-rdl-divCenter-transp css-rdl-gestion-sub"><br />
        <div class="col-lg-5 css-rdl-config css-rdl-margin">
            <h3 class="text-center"><i class="fas fa-pen-alt"></i> Modifier un chauffeur</h3>
            <hr class="style14"> <br />
            <div class="css-rdl-alert"></div>
            <form method="post" id="UpdateDriverForm" name="UpdateDriverForm">
                <div class="row">
                    <div class="col-lg-12 css-rdl-padInput">
                        <label class="sr-only" for="inlineFormInputGroup">Tous les chauffeurs</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                            </div>
                            <select name="all_drivers" id="all_drivers" class="form-control" required>
                                <option value="0"> Tous les chauffeurs</option>
                                <?php
                                $rs = pg_query($idc, "SELECT cf_id, cf_pseudo_trimble, cf_nom, cf_prenom, cf_mail, t_chauffeur.sp_id, sp_libelle
                                    FROM t_chauffeur, t_siteprod
                                    WHERE t_chauffeur.sp_id = t_siteprod.sp_id
                                    ORDER BY cf_nom, cf_prenom");
                                while ($ligne = pg_fetch_assoc($rs)) {
                                    echo "<option value='$ligne[cf_id]'>$ligne[cf_nom] $ligne[cf_prenom]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 css-rdl-padInput">
                        <label class="sr-only" for="inlineFormInputGroup">Nom</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                            </div>
                            <input type="text" name="nom" id="nom" class="form-control" placeholder="Nom" required />
                        </div>
                    </div>
                    <div class="col-lg-6 css-rdl-padInput">
                        <label class="sr-only" for="inlineFormInputGroup">prenom</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                            </div>
                            <input type="text" name="prenom" id="prenom" class="form-control" placeholder="Prénom" required />
                        </div>
                    </div>
                    <div class="col-lg-6 css-rdl-padInput">
                        <label class="sr-only" for="inlineFormInputGroup">tel</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-phone"></i></div>
                            </div>
                            <input type="tel" name="tel" id="tel" class="form-control" placeholder="Téléphone" pattern="[0-9]{10}" required />
                        </div>
                    </div>
                    <div class="col-lg-6 css-rdl-padInput">
                        <label class="sr-only" for="inlineFormInputGroup">mail</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                            </div>
                            <input type="email" name="mail" id="mail" class="form-control" placeholder="E-mail" required />
                        </div>
                    </div>
                    <div class="col-lg-6 css-rdl-padInput">
                        <label class="sr-only" for="inlineFormInputGroup">trimble</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-truck-moving"></i></div>
                            </div>
                            <input type="text" name="trimble" id="trimble" class="form-control" placeholder="Pseudo Trimble" required />
                        </div>
                    </div>
                    <div class="col-lg-6 css-rdl-padInput">
                        <label class="sr-only" for="inlineFormInputGroup">SP</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-warehouse"></i></div>
                            </div>
                            <select class="form-control" name="l_sp" id="l_sp" required>
                                <?php
                                $rs = pg_query($idc, "SELECT sp_libelle, sp_id FROM t_siteprod ORDER BY sp_libelle");
                                echo "<option value=''>Sélectionner un site</option>";
                                while ($ligne = pg_fetch_assoc($rs)) {
                                    echo "<option value='$ligne[sp_id]'>$ligne[sp_libelle]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <br />
                <div id="driverResult"></div>
                <br />
                <div class="text-center">
                    <input type="submit" name="submit_button" value="Mettre à jour" class="btn btn-info formbutton" id="submit_button" /><br />
                </div>
            </form>
        </div>
        <div class="col-lg-2"></div>

        <div class="col-lg-5 css-rdl-config css-rdl-margin">
            <h3 class="text-center"><i class="fas fa-pen-alt"></i> Modifier un site de production</h3>
            <hr class="style14"> <br />
            <div class="css-rdl-alert"></div>
            <form method="post" id="UpdateSiteForm" name="UpdateSiteForm">
                <div class="row">
                    <div class="col-lg-12 css-rdl-padInput">
                        <label class="sr-only" for="inlineFormInputGroup">Tous les sites de production</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                            </div>
                            <select class="form-control" name="all_sp" id="all_sp" required>
                                <?php
                                $rs = pg_query($idc, "SELECT sp_libelle, sp_id FROM t_siteprod ORDER BY sp_libelle");
                                echo "<option value=''>Sélectionner un site</option>";
                                while ($ligne = pg_fetch_assoc($rs)) {
                                    echo "<option value='$ligne[sp_id]'>$ligne[sp_libelle]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12 css-rdl-padInput">
                        <label class="sr-only" for="inlineFormInputGroup">ville</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-city"></i></div>
                            </div>
                            <input type="text" name="ville_site" id="ville_site" class="form-control" placeholder="Ville" required />
                        </div>
                    </div>
                    <div class="col-lg-12 css-rdl-padInput">
                        <label class="sr-only" for="inlineFormInputGroup">Latitude</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-thumbtack"></i></div>
                            </div>
                            <input type="text" id="lat" pattern="^-?([1-8]?[1-9]|[1-9]0)\.{1}\d{1,6}" name="latitude"  class="form-control" placeholder="Latitude" required />
                        </div>
                    </div>
                    <div class="col-lg-12 css-rdl-padInput">
                        <label class="sr-only" for="inlineFormInputGroup">longitude</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-thumbtack"></i></div>
                            </div>
                            <input type="text" id="long" name="longitude" id="longitude" class="form-control" placeholder="Longitude" pattern="^-?([1-8]?[1-9]|[1-9]0)\.{1}\d{1,6}" required />
                        </div>
                    </div>
                </div>
                <br />
                <div id="siteResult"></div>
                <br>
                <div class="text-center">
                    <input type="submit" name="submit_button" value="Mettre à jour" class="btn btn-info formbutton" id="submit_button" /><br />
                </div>
            </form>
        </div>


    </div>
</div>



<?php

include('dist/include/html/footer.php');
include('dist/include/html/script.php');

?>

<script>
    $(document).ready(function() {

        $('#all_drivers').on('change', function(e) {
            e.preventDefault();
            let id_driver = $("#all_drivers").val();

            $.ajax({
                type: "GET",
                url: "load_data_driver.php",
                data: {
                    id_driver: id_driver
                },
                success: function(result) {
                    $.each(JSON.parse(result), function(i, item) {
                        if (item.field == "nom") {
                            $("#nom").val(item.value);
                        } else if (item.field == "prenom") {
                            $("#prenom").val(item.value);
                        } else if (item.field == "tel") {
                            $("#tel").val(item.value);
                        } else if (item.field == "mail") {
                            $("#mail").val(item.value);
                        } else if (item.field == "trimble") {
                            $("#trimble").val(item.value);
                        } else if (item.field == "l_sp") {
                            $("#l_sp").val(item.value);
                        }
                    });
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert('error');
                }
            });
        });

        $('#all_sp').on('change', function(e) {
            e.preventDefault();
            let id_sp = $("#all_sp").val();

            $.ajax({
                type: "GET",
                url: "load_data_sp.php",
                data: {
                    id_sp: id_sp
                },
                success: function(result) {
                    $.each(JSON.parse(result), function(i, item) {
                        if (item.field == "ville_site") {
                            $("#ville_site").val(item.value);
                        } else if (item.field == "latitude") {
                            $("#lat").val(item.value);
                        } else if (item.field == "longitude") {
                            $("#long").val(item.value);
                        }
                    });
                    // console.log(result);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert('error');
                }
            });
        });


        $('#UpdateDriverForm').on('submit', function(e) {
            e.preventDefault();

            let nom = $("#nom").val();
            let prenom = $("#prenom").val();
            let tel = $("#tel").val();
            let mail = $("#mail").val();
            let trimble = $("#trimble").val();
            let l_sp = $("#l_sp").val();
            let id_driver = $("#all_drivers").val();
            $.ajax({
                type: "GET",
                url: "update_driver.php",
                data: {
                    nom: nom,
                    prenom: prenom,
                    tel: tel,
                    mail: mail,
                    trimble: trimble,
                    sp_id: l_sp,
                    id_driver: id_driver
                },
                success: function(result) {
                    $("#driverResult").html('Les informations du chauffeur ' + nom + ' ' + prenom + ' ont bien été mises à jour.');
                    // $("#driverResult").html(result);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    $("#driverResult").html('Une erreur est survenue. Veuillez réessayer.');
                }
            });
        });

        $('#UpdateSiteForm').on('submit', function(e) {
            e.preventDefault();

            let ville = $("#ville_site").val();
            let lat = $("#lat").val();
            let long = $("#long").val();
            let id_sp = $("#all_sp").val();

            $.ajax({
                type: "GET",
                url: "update_site.php",
                data: {
                    ville: ville,
                    lat: lat,
                    long: long,
                    id_sp: id_sp,
                },
                success: function(result) {
                    $("#siteResult").html('Le site de production dans la ville de ' + ville + ' a bien été mis à jour');
                    // $("#siteResult").html(result);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    $("#siteResult").html('Une erreur est survenue. Veuillez réessayer.');
                }
            });
        });


    })
</script>