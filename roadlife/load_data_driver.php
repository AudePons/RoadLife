<?php

include('dist/fonctions/connect.php');
$idc = connect();

$rs = pg_query($idc, "SELECT cf_pseudo_trimble, cf_nom, cf_prenom, cf_mail, sp_libelle, cf_numtel
    FROM t_chauffeur, t_siteprod
    WHERE t_chauffeur.sp_id = t_siteprod.sp_id
    AND cf_id = '$_GET[id_driver]';");
$ligne = pg_fetch_assoc($rs);
