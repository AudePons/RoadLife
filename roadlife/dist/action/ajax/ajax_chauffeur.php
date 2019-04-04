<?php

	$num= $_GET['cf_id'];

	include('../../fonctions/connect.php');
	$idc = connect();

	$sql_cf_2 = "SELECT cf_id, cf_nom, cf_prenom, cf_numtel, cf_mail, sp_id FROM t_chauffeur WHERE cf_id=".$num." ORDER BY cf_nom;";
	$rs_cf_2 = pg_query($idc, $sql_cf_2);
	$ligne_cf_2 = pg_fetch_assoc($rs_cf_2);
	print('<h5><i class="fa fa-user-circle"></i> Informations personnelles</h5>');
	print('<input type="text"  name="zs_nom" pattern="[a-zA-Zéèç-]{1,15}" placeholder="Nom" value="'.$ligne_cf_2['cf_nom'].'"/><br /><br />');
	print('<input type="text"  name="zs_prenom" pattern="[a-zA-Zéèç-]{1,15}" placeholder="Prénom" value="'.$ligne_cf_2['cf_prenom'].'" /> <br /><br />');
	print('<input type="text"  name="zs_tel" id="tel" pattern="[0-9]{10}" placeholder="Téléphone" value="'.$ligne_cf_2['cf_numtel'].'"/> <br/><br />');
	print('<input type="text"  name="zs_mail" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$" placeholder="E-mail" value="'.$ligne_cf_2['cf_mail'].'"/>');

?>

<!-- <h5><i class="fa fa-user-circle"></i> Informations personnelles</h5>
<input type="text"  name="zs_nom" pattern="[a-zA-Zéèç-]{1,15}" placeholder="Nom" /><br /><br />
<input type="text"  name="zs_prenom" pattern="[a-zA-Zéèç-]{1,15}" placeholder="Prénom" /> <br /><br />
<input type="text"  name="zs_tel" id="tel" pattern="[0-9]{10}" placeholder="Téléphone" /> <br/><br />
<input type="text"  name="zs_mail" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$" placeholder="E-mail" /> -->