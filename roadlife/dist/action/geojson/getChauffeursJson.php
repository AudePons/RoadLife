<?php
		// $idc = pg_connect('host=10.11.159.20 dbname = BD_camion_test user=postgres password=postgres');
	include('../../fonctions/connect.php');
	$idc=connect();
		
		$sql='SELECT "idTraces", cast("time" as timestamp) as "date", cast("LongitudeGps" AS double precision) as lng, cast("LatitudeGps" AS double precision) AS lat 
				FROM "trimbleTraces"
				WHERE "LatitudeGps" IS NOT NULL 
				AND "LongitudeGps" IS NOT NULL
				ORDER BY "date"';
// 		$sql='SELECT "idTraces", cast("time" as timestamp) as date, st_makeline(st_makepoint((cast("LongitudeGps"  as double precision)),(cast("LatitudeGps" as double precision))) as coord1, st_makepoint((cast("LongitudeGps"  as double precision)),(cast("LatitudeGps" as double precision)))) as coord2
// FROM "trimbleTraces"
// WHERE "LatitudeGps" IS NOT NULL AND "LongitudeGps" IS NOT NULL
// group by "idTraces"
// ORDER BY date';		
		$rs=pg_exec($idc,$sql);

		/*tableau geojson*/
		$geojson = array( 
			'type'      => 'FeatureCollection', 
			'features'  => array() 
		); 

# Loop through rows to build feature arrays
while($ligne = pg_fetch_assoc($rs)) {
    $feature = array(
        'idTraces' => $ligne['idTraces'],
        'type' => 'Feature', 
        'geometry' => array(
            'type' => 'Point',
            # Pass Longitude and Latitude Columns here
            'coordinates' => array($ligne['lng'],$ligne['lat'])
        ),
        # Pass other attribute columns here
        'properties' => array(
            'idTraces' => $ligne['idTraces'],
            'LongitudeGps' => $ligne['lng'],
            'LatitudeGps' => $ligne['lat'],
            'date' => $ligne['date'],
            ),
        );

		/*ajout du tableau*/
		array_push($geojson['features'], $feature); 

		}

		//header('Content-type: application/json');
		/*transformation au format geojson*/ 
		echo (json_encode($geojson, JSON_NUMERIC_CHECK)); 
		//$idc=NULL;
