<?php
// FICHIER PHP POUR L'AFFICHAGE DES PARCOURS ET DES PDC SUR LA CARTE LEAFLET ADMIN

	// connection BDD
	include('../../fonctions/connect.php');
	$idc=connect();
	
	// Requêtes sql
	// $sql='Select num_parcours as id,ST_AsGeoJSON(geom) as line from c_parcours';
	$sql2='SELECT cf_id, cf_pseudo_trimble, cf_nom, cf_prenom, cf_mail, sp_id, cf_numtel, cast("cf_long" AS double precision) as lng, cast("cf_lat" AS double precision) AS lat from t_chauffeur';
	
	
	// Initialisation à 0
	$cf_id = isset($_GET['cf_id'])?(int)$_GET['cf_id']:0;
	if($cf_id  > 0 ){
		// $sql.=" where cf_id = '".$cf_id."'";
		$sql2.=" where cf_id = '".$cf_id."'";
	}

		// echo $_GET['cf_id'].'</br>';
		// echo $sql2;

		// déclaration de la méthode POST
		$data = $_POST;
		 
		//  // execution des requetes
		//  // $rs=pg_exec($idc,$sql);
		 $rs2=pg_exec($idc,$sql2);

		// Geojson
		$geojson = array(
		   'type'      => 'FeatureCollection',
		   'features'  => array()
		);
		
		
		// Travail sur la premiere requete
		// $i = 0;
		// while($row = pg_fetch_assoc($rs)) {
		// 	$geojson["features"][$i]["type"] = "Feature";
		// 	$geojson["features"][$i]["properties"] = array();
		// 	$geojson["features"][$i]["id"] = $row['id'];
		// 	$geojson["features"][$i]["geometry"] = json_decode($row['line']);
		// 	$i++;
		// }
		
	while($ligne = pg_fetch_assoc($rs2)) {
    $feature = array(
        'cf_id' => $ligne['cf_id'],
        'type' => 'Feature', 
        'geometry' => array(
            'type' => 'Point',
            # Pass Longitude and Latitude Columns here
            'coordinates' => array($ligne['lng'],$ligne['lat'])
        ),
        # Pass other attribute columns here

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
