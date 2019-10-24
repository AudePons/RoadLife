<?php

include('../../fonctions/connect.php');
$idc = connect();

$file = 'ficheXML.xml';

if(is_file($file)) { unlink($file); }

$xml = '<page>';

$sql_chauffeur = "SELECT cf_id, cf_pseudo_trimble, cf_nom, cf_prenom, cf_mail, sp_id, cf_numtel, cf_lat, cf_long FROM t_chauffeur;";
$rs_chauffeur = pg_query($idc, $sql_chauffeur);
while($ligne_xml=pg_fetch_assoc($rs_chauffeur))
{
	$xml .= '<num_driver>'.$ligne_xml['cf_id'].'</num_driver> \'n\'';
	$xml .= '<pseudo_trimble>'.$ligne_xml['cf_pseudo_trimble'].'</pseudo_trimble>';
	$xml .= '<nom_driver>'.$ligne_xml['cf_nom'].'</nom_driver> \'n\'';
	$xml .= '<prenom_driver>'.$ligne_xml['cf_prenom'].'</prenom_driver>';
	$xml .= '<mail_driver>'.$ligne_xml['cf_mail'].'</mail_driver>';
	$xml .= '<tel_driver>'.$ligne_xml['cf_numtel'].'</tel_driver>';
	$xml .= '<lat>'.$ligne_xml['cf_lat'].'</lat>';
	$xml .= '<long>'.$ligne_xml['cf_long'].'</long>';
}

$xml .= '</page>';

file_put_contents($file, $xml, FILE_APPEND | LOCK_EX);
?>