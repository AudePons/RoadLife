<?php

include('../fonctions/connect.php');
$idc = connect();

$file = 'ficheXML.xml';

if(is_file($file)) { unlink($file); }

$xml = '<journee>';

$sql_chauffeur = "SELECT cf_id, cf_pseudo_trimble, cf_nom, cf_prenom, cf_mail, sp_id, cf_numtel, cf_lat, cf_long FROM t_chauffeur;";
$rs_chauffeur = pg_query($idc, $sql_chauffeur);

while($ligne_xml=pg_fetch_assoc($rs_chauffeur))
{
	$xml .= '<num_chauffeur>'.$ligne_xml['']
}

	$sql_wiki = "SELECT DISTINCT titre_wiki FROM wiki;";
	$rs_wiki = pg_query($log, $sql_wiki);

	while($selection = pg_fetch_assoc($rs_wiki))
	{
		$xml .= '<suggestion>';
		$xml .= '<titre>'.$selection['titre_wiki'].'</titre>';
		$xml .= '</suggestion>';
	}

$xml .= '</page>';

file_put_contents($le_chemin.$file, $xml, FILE_APPEND | LOCK_EX);
?>