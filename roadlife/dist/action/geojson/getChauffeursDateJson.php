<?php
include('../../fonctions/connect.php');
$idc = connect();

$sql = 'SELECT DISTINCT "idTraces", "keyPropriete", "valuePropriete",
 						max(cast("time" as timestamp)) as date,
						(cast("LongitudeGps"  as double precision)) as lng, (cast("LatitudeGps" as double precision)) as lat

				FROM "trimbleTraces"

				INNER JOIN "trimbleProprietesTraces" 
				ON "trimbleTraces"."idTraces" = "trimbleProprietesTraces"."idTrace"

				WHERE ("LatitudeGps" IS NOT NULL AND "LongitudeGps" IS NOT NULL) 
				AND ("keyPropriete"= \'DID\') 
				GROUP BY "idTraces", "keyPropriete", "valuePropriete"';

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
			'idTraces' =>  $ligne['idTraces'],
			'valuePropriete' => $ligne['valuePropriete'],
			'LongitudeGps' => $ligne['lng'],
			'LatitudeGps' => $ligne['lat'],
			'date' => $ligne['date'],
		),
	);

	array_push($geojson['features'], $feature);
}

echo (json_encode($geojson, JSON_NUMERIC_CHECK));
