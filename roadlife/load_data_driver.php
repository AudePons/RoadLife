<?php

include('dist/fonctions/connect.php');
$idc = connect();

$rs = pg_query($idc, "SELECT t_siteprod.sp_id, cf_pseudo_trimble, cf_nom, cf_prenom, cf_mail, sp_libelle, cf_numtel
    FROM t_chauffeur, t_siteprod
    WHERE t_chauffeur.sp_id = t_siteprod.sp_id
    AND cf_id = '$_GET[id_driver]';");
$ligne = pg_fetch_assoc($rs);

$json = array(
    array(
        'field' => 'nom',
        'value' => $ligne['cf_nom']
    ),
    array(
        'field' => 'prenom',
        'value' => $ligne['cf_prenom']
    ),
    array(
        'field' => 'tel',
        'value' => $ligne['cf_numtel']
    ),
    array(
        'field' => 'trimble',
        'value' => $ligne['cf_pseudo_trimble']
    ),
    array(
        'field' => 'l_sp',
        'value' => $ligne['sp_id']
    ),
    array(
        'field' => 'mail',
        'value' => $ligne['cf_mail']
    )
);

echo json_encode($json);
