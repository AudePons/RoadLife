<?php

include('dist/fonctions/connect.php');
$idc = connect();

pg_query($idc, "INSERT INTO t_siteprod (sp_libelle, sp_lat, sp_long) VALUES ('$_GET[ville]', $_GET[lat], $_GET[long]);");