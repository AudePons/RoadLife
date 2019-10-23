<?php

include('dist/fonctions/connect.php');
$idc = connect();

pg_query($idc, "INSERT INTO t_chauffeur (cf_pseudo_trimble, cf_nom, cf_prenom, cf_mail, sp_id, cf_numtel) 
VALUES ('$_GET[trimble]', '$_GET[nom]', '$_GET[prenom]', '$_GET[mail]', $_GET[sp_id], '$_GET[tel]');");