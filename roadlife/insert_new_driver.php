<?php

include('dist/fonctions/connect.php');
$idc = connect();

$rs = pg_query($idc, "SELECT sp_lat, sp_long FROM t_siteprod WHERE sp_id = $_GET[sp_id]");
$row = pg_fetch_assoc($rs);

pg_query($idc, "INSERT INTO t_chauffeur (cf_pseudo_trimble, cf_nom, cf_prenom, cf_mail, sp_id, cf_numtel, cf_lat, cf_long) 
VALUES ('$_GET[trimble]', '$_GET[nom]', '$_GET[prenom]', '$_GET[mail]', $_GET[sp_id], '$_GET[tel]', '$row[sp_lat]', '$row[sp_long]');");