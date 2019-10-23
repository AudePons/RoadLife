<?php

include('../../fonctions/connect.php');
$idc = connect();

$sql = 'SELECT "idTraces", cast("time" as timestamp) as "date", cast("LongitudeGps" AS double precision) as lng, cast("LatitudeGps" AS double precision) AS lat 
				FROM "trimbleTraces"
				WHERE "LatitudeGps" IS NOT NULL 
				AND "LongitudeGps" IS NOT NULL
				ORDER BY "date"';

$rs = pg_exec($idc, $sql);

$geojson = array(
	'type'      => 'FeatureCollection',
	'features'  => array()
);

while ($ligne = pg_fetch_assoc($rs)) {
	$feature = array(
		'idTraces' => $ligne['idTraces'],
		'type' => 'Feature',
		'geometry' => array(
			'type' => 'Point',
			'coordinates' => array($ligne['lng'], $ligne['lat'])
		),
		'properties' => array(
			'idTraces' => $ligne['idTraces'],
			'LongitudeGps' => $ligne['lng'],
			'LatitudeGps' => $ligne['lat'],
			'date' => $ligne['date'],
		),
	);

	array_push($geojson['features'], $feature);
}

echo (json_encode($geojson, JSON_NUMERIC_CHECK));
