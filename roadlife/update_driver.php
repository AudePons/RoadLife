<?php

include('dist/fonctions/connect.php');
$idc = connect();

$rs = pg_query($idc, "SELECT sp_lat, sp_long FROM t_siteprod WHERE sp_id = $_GET[sp_id]");
$row = pg_fetch_assoc($rs);

pg_query($idc, "UPDATE t_chauffeur SET cf_pseudo_trimble = '$_GET[trimble]', cf_nom = '$_GET[nom]', cf_prenom = '$_GET[prenom]', cf_mail = '$_GET[mail]', sp_id = $_GET[sp_id], cf_numtel = '$_GET[tel]', cf_lat = '$row[sp_lat]', cf_long = '$row[sp_long]' WHERE cf_id = $_GET[id_driver];");

// echo $_GET['id_driver'];