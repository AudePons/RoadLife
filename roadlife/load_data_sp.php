<?php

include('dist/fonctions/connect.php');
$idc = connect();

$rs = pg_query($idc, "SELECT sp_libelle, sp_long, sp_lat from t_siteprod WHERE sp_id = '$_GET[id_sp]';");
$ligne = pg_fetch_assoc($rs);

$json = array(
    array(
        'field' => 'ville_site',
        'value' => $ligne['sp_libelle']
    ),
    array(
        'field' => 'latitude',
        'value' => $ligne['sp_lat']
    ),
    array(
        'field' => 'longitude',
        'value' => $ligne['sp_long']
    ),
);

echo json_encode($json);
