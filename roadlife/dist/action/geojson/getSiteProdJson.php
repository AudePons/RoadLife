<?php
include('../../fonctions/connect.php');
$idc = connect();

$sql = 'SELECT sp_id, sp_libelle, cast("sp_long" AS double precision) as lng, cast("sp_lat" AS double precision) AS lat 
				FROM t_siteprod
				WHERE sp_long IS NOT NULL 
				AND sp_lat IS NOT NULL';
$rs = pg_exec($idc, $sql);

$geojson = array(
	'type'      => 'FeatureCollection',
	'features'  => array()
);

while ($ligne = pg_fetch_assoc($rs)) {
	$feature = array(
		'sp_id' => $ligne['sp_id'],
		'type' => 'Feature',
		'geometry' => array(
			'type' => 'Point',
			'coordinates' => array($ligne['lng'], $ligne['lat'])
		),
		'properties' => array(
			'sp_id' => $ligne['sp_id'],
			'sp_libelle' => $ligne['sp_libelle'],
			'LongitudeGps' => $ligne['lng'],
			'LatitudeGps' => $ligne['lat'],
		),
	);

	array_push($geojson['features'], $feature);
}

echo (json_encode($geojson, JSON_NUMERIC_CHECK)); 
