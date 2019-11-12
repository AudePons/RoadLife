<?php

include('dist/fonctions/connect.php');
$idc = connect();

pg_query($idc, "UPDATE t_siteprod SET sp_libelle = '$_GET[ville]', sp_lat = '$_GET[lat]', sp_long = '$_GET[long]' WHERE sp_id = $_GET[id_sp];");

// echo $_GET['ville'];