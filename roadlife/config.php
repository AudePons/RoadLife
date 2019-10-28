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
            <h3 class="text-center"><i class="fas fa-plus-circle"></i> Ajouter un chauffeur</h3>
            <hr class="style14"> <br />
            <div class="css-rdl-alert"></div>
            <form method="post" id="newDriverForm" name="newDriverForm">
                <div class="row">
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
                    <input type="submit" name="submit_button" value="Ajouter" class="btn btn-info formbutton" id="submit_button" /><br /><br/>
                    <a href="config_update.php"><small>Pour modifier un chauffeur, cliquez ICI.</small></a>
                </div>
            </form>
        </div>
        <div class="col-lg-2"></div>

        <div class="col-lg-5 css-rdl-config css-rdl-margin">
            <h3 class="text-center"><i class="fas fa-plus-circle"></i> Ajouter un site de production</h3>
            <hr class="style14"> <br />
            <div class="css-rdl-alert"></div>
            <form method="post" id="newSiteForm" name="newSiteForm">
                <div class="row">
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
                            <input type="text" id="lat" pattern="^-?([1-8]?[1-9]|[1-9]0)\.{1}\d{1,6}" name="latitude" class="form-control" placeholder="Latitude" required />
                        </div>
                    </div>
                    <div class="col-lg-12 css-rdl-padInput">
                        <label class="sr-only" for="inlineFormInputGroup">longitude</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-thumbtack"></i></div>
                            </div>
                            <input type="text" id="long" name="longitude" class="form-control" placeholder="Longitude" pattern="^-?([1-8]?[1-9]|[1-9]0)\.{1}\d{1,6}" required />
                        </div>
                    </div>
                </div>
                <br />
                <div id="siteResult"></div>
                <br>
                <div class="text-center">
                    <input type="submit" name="submit_button" value="Ajouter" class="btn btn-info formbutton" id="submit_button" /><br /><br/>
                    <a href="config_update.php"><small>Pour modifier un site de production, cliquez ICI.</small></a>
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
        $('#newDriverForm').on('submit', function(e) {
            e.preventDefault();

            let nom = $("#nom").val();
            let prenom = $("#prenom").val();
            let tel = $("#tel").val();
            let mail = $("#mail").val();
            let trimble = $("#trimble").val();
            let l_sp = $("#l_sp").val();

            alert(l_sp);
            $.ajax({
                type: "GET",
                url: "insert_new_driver.php",
                data: {
                    nom: nom,
                    prenom: prenom,
                    tel: tel,
                    mail: mail,
                    trimble: trimble,
                    sp_id: l_sp
                },
                success: function(result) {
                    $("#driverResult").html('Le chauffeur' + nom + ' ' +prenom + ' a bien été crée.');
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    $("#driverResult").html('Une erreur est survenue. Veuillez réessayer.');
                }
            });
        });

        $('#newSiteForm').on('submit', function(e) {
            e.preventDefault();

            let ville = $("#ville_site").val();
            let lat = $("#lat").val();
            let long = $("#long").val();

            $.ajax({
                type: "GET",
                url: "insert_new_site.php",
                data: {
                    ville: ville,
                    lat: lat,
                    long: long,
                },
                success: function(result) {
                    $("#siteResult").html('Le site de production dans la ville de : ' + ville + ' a bien été crée');
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    $("#siteResult").html('Une erreur est survenue. Veuillez réessayer.');
                }
            });
        });
    })
</script>