<?php
    session_start();

    $title = 'Panneau de configuration';
    include('dist/include/html/head.php');
    include('dist/include/html/navigation.php');

    echo('<div class="row" id="css-rdl-body">
        <div class="row css-rdl-divCenter-transp css-rdl-gestion-sub"><br/>
            <div class="col-lg-5 css-rdl-config css-rdl-margin">
                <h3 class="text-center"><i class="fas fa-plus-circle"></i> Ajouter un chauffeur</h3>
                <hr class="style14"> <br />
                <div class="css-rdl-alert"></div>
                <form method="post" action="gestion_sub.php">
                    <div class="row">
                        <div class="col-lg-6 css-rdl-padInput">
                            <label class="sr-only" for="inlineFormInputGroup">Nom</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                                </div>
                                <input type="text" name="nom" class="form-control" placeholder="Nom" />
                            </div>
                        </div>
                        <div class="col-lg-6 css-rdl-padInput">
                            <label class="sr-only" for="inlineFormInputGroup">prenom</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                                </div>
                                <input type="text" name="prenom" class="form-control" placeholder="Prénom" />
                            </div>
                        </div>
                        <div class="col-lg-6 css-rdl-padInput">
                            <label class="sr-only" for="inlineFormInputGroup">tel</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-phone"></i></div>
                                </div>
                                <input type="text" name="tel" class="form-control" placeholder="Téléphone" />
                            </div>
                        </div>
                        <div class="col-lg-6 css-rdl-padInput">
                            <label class="sr-only" for="inlineFormInputGroup">mail</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                                </div>
                                <input type="text" name="mail" class="form-control" placeholder="E-mail" />
                            </div>
                        </div>
                        <div class="col-lg-6 css-rdl-padInput">
                            <label class="sr-only" for="inlineFormInputGroup">trimble</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-truck-moving"></i></div>
                                </div>
                                <input type="text" name="trimble" class="form-control" placeholder="Pseudo Trimble" />
                            </div>
                        </div>
                        <div class="col-lg-6 css-rdl-padInput">
                            <label class="sr-only" for="inlineFormInputGroup">SP</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-warehouse"></i></div>
                                </div>
                                <select class="form-control" name="l_sp">
                                    <option value="0">Sélectionner un site</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="text-center">
                        <input type="submit" name="submit_button" value="Ajouter" class="btn btn-info formbutton" id="submit_button"/><br/>
                    </div>
                    <div class="text-center">
                        <small>Pour modifier un chauffeur, cliquez ICI.</small>
                    </div>
                </form>
            </div>
            <div class="col-lg-2"></div>

            <div class="col-lg-5 css-rdl-config css-rdl-margin">
                <h3 class="text-center"><i class="fas fa-plus-circle"></i> Ajouter un site de production</h3>
                <hr class="style14"> <br />
                <div class="css-rdl-alert"></div>
                <form method="post" action="gestion_sub.php">
                    <div class="row">
                        <div class="col-lg-12 css-rdl-padInput">
                            <label class="sr-only" for="inlineFormInputGroup">ville</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-city"></i></div>
                                </div>
                                <input type="text" name="ville" class="form-control" placeholder="Ville" />
                            </div>
                        </div>
                        <div class="col-lg-12 css-rdl-padInput">
                            <label class="sr-only" for="inlineFormInputGroup">Latitude</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-thumbtack"></i></div>
                                </div>
                                <input type="text" name="latitude" class="form-control" placeholder="Latitude" />
                            </div>
                        </div>
                        <div class="col-lg-12 css-rdl-padInput">
                            <label class="sr-only" for="inlineFormInputGroup">longitude</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-thumbtack"></i></div>
                                </div>
                                <input type="text" name="longitude" class="form-control" placeholder="Longitude" />
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="text-center">
                        <input type="submit" name="submit_button" value="Ajouter" class="btn btn-info formbutton" id="submit_button"/><br/>
                    </div>
                    <div class="text-center">
                        <small>Pour modifier un site de production, cliquez ICI.</small>
                    </div>
                </form>
            </div>

            
        </div>
    </div>');

    
 


    include('dist/include/html/footer.php');
    include('dist/include/html/script.php');
?>