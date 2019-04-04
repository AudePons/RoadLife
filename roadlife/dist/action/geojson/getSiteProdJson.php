<?php
		// $idc = pg_connect('host=10.11.159.20 dbname = BD_camion_test user=postgres password=postgres');
	include('../../fonctions/connect.php');
	$idc=connect();
		
		$sql='SELECT sp_id, sp_libelle, cast("sp_long" AS double precision) as lng, cast("sp_lat" AS double precision) AS lat 
				FROM t_siteprod
				WHERE sp_long IS NOT NULL 
				AND sp_lat IS NOT NULL';
		$rs=pg_exec($idc,$sql);

		/*tableau geojson*/
		$geojson = array( 
			'type'      => 'FeatureCollection', 
			'features'  => array() 
		); 

# Loop through rows to build feature arrays
while($ligne = pg_fetch_assoc($rs)) {
    $feature = array(
        'sp_id' => $ligne['sp_id'],
        'type' => 'Feature', 
        'geometry' => array(
            'type' => 'Point',
            # Pass Longitude and Latitude Columns here
            'coordinates' => array($ligne['lng'],$ligne['lat'])
        ),
        # Pass other attribute columns here
        'properties' => array(
            'sp_id' => $ligne['sp_id'],
            'sp_libelle' => $ligne['sp_libelle'],
            'LongitudeGps' => $ligne['lng'],
            'LatitudeGps' => $ligne['lat'],
            // 'date' => $ligne['date'],
            ),
        );

		/*ajout du tableau*/
		array_push($geojson['features'], $feature); 

		}

		//header('Content-type: application/json');
		/*transformation au format geojson*/ 
		echo (json_encode($geojson, JSON_NUMERIC_CHECK)); 
		//$idc=NULL;
