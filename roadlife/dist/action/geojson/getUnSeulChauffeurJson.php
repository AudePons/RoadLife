<?php
include('../../fonctions/connect.php');
$idc = connect();

$sql2 = 'SELECT cf_id, cf_pseudo_trimble, cf_nom, cf_prenom, cf_mail, sp_id, cf_numtel, cast("cf_long" AS double precision) as lng, cast("cf_lat" AS double precision) AS lat from t_chauffeur';


$cf_id = isset($_GET['cf_id']) ? (int) $_GET['cf_id'] : 0;
if ($cf_id  > 0) {
	$sql2 .= " where cf_id = '" . $cf_id . "'";
}

$data = $_POST;

$rs2 = pg_exec($idc, $sql2);

$geojson = array(
	'type'      => 'FeatureCollection',
	'features'  => array()
);

while ($ligne = pg_fetch_assoc($rs2)) {
	$feature = array(
		'cf_id' => $ligne['cf_id'],
		'type' => 'Feature',
		'geometry' => array(
			'type' => 'Point',
			'coordinates' => array($ligne['lng'], $ligne['lat'])
		),

		'properties' =>  array(
			'cf_id' => $ligne['cf_id'],
			'cf_pseudo_trimble' => $ligne['cf_pseudo_trimble'],
			'cf_nom' => $ligne['cf_nom'],
			'cf_prenom' => $ligne['cf_prenom'],
			'cf_mail' => $ligne['cf_mail'],
			'sp_id' => $ligne['sp_id'],
			'cf_numtel' => $ligne['cf_numtel'],
			'cf_long' => $ligne['lng'],
			'cf_lat' => $ligne['lat'],
		),
	);

	array_push($geojson['features'], $feature);
}

echo (json_encode($geojson, JSON_NUMERIC_CHECK));
