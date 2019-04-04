<?php 
    echo('<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">
            <img src="dist/image/logo/logo.png" width="40" height="40" alt="">
            RoadLife
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" 
        aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">');
            if(isset($_SESSION["us_num"]) && (int)$_SESSION["us_num"] > 0)
            {   
                echo('<ul class="navbar-nav mr-auto">');
                if ($_SESSION['us_num'] == 1)
                {
                    echo('<li class="nav-item">
                        <a class="nav-link" href="config.php"> <i class="fas fa-database"></i> Configuration</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="gestion_sub.php"> <i class="fas fa-user-check"></i> Gestion des inscriptions</a>
                    </li>');
                }
                    echo('<li class="nav-item">
                        <a class="nav-link" href="profil.php"> <i class="fas fa-user-cog"></i> Profil</a>
                    </li>
                </ul>
                <ul class="navbar-nav mr-auto"> </ul>
                <ul class="navbar-nav justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php"> <i class="fas fa-sign-out-alt"></i> Déconnexion</a>
                    </li>
                </ul>');
            }
            else
            {
                echo('<ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="subscribe.php"> <i class="fas fa-user-plus"></i> Inscription</a>
                    </li>
                </ul>
                <ul class="navbar-nav mr-auto"> </ul>
                <ul class="navbar-nav justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php"> <i class="fas fa-sign-in-alt"></i> Connexion</a>
                    </li>
                </ul>');
            }
        echo('</div>
    </nav>');