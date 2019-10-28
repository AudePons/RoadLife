<?php
include('../../fonctions/connect.php');
$idc = connect();

$features = [];

$sql = "SELECT *, ST_AsGeoJSON(ST_transform(geom, 4326), 5) as geojson FROM t_trajet ";
$rs = pg_query($idc, $sql);
while ($ligne = pg_fetch_assoc($rs)) {
    unset($ligne['geom']);
    $geometry = json_decode($ligne['geojson']);
    unset($ligne['geojson']);
    $feature = ["type" => "Feature", "geometry" => $geometry, "table" => "t_trajet", "error" => "false", "properties" => $ligne];
    array_push($features, $feature);
}


$featureCollection = ["type" => "FeatureCollection", "features" => $features];
echo json_encode($featureCollection);