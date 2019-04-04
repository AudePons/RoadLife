<?php

	$num= $_GET['uni_id'];

	include('../../fonctions/connect.php');
	$idc=connect();

	$sql_uni_2 = "SELECT uni_id, uni_ref, veh_id FROM t_trimble_unite WHERE uni_id=".$num.";";
	$rs_uni_2 = pg_query($idc, $sql_uni_2);
	$ligne_uni_2 = pg_fetch_assoc($rs_uni_2);

	$sql_uni_3 = "SELECT uni_id, t_trimble_unite.veh_id, veh_immat FROM t_vehicule, t_trimble_unite WHERE t_vehicule.veh_id = t_trimble_unite.veh_id AND uni_id=".$num.";";
	$rs_uni_3 = pg_query($idc, $sql_uni_3);
	$ligne_uni_3 = pg_fetch_assoc($rs_uni_3);

	$sql_uni_4 = "SELECT veh_id, veh_immat FROM t_vehicule ORDER BY veh_immat;";
	$rs_uni_4 = pg_query($idc, $sql_uni_4);
	print('<div class="part-form-5" id="part-form-5">');
	print('<h5><i class="fa fa-question-circle"></i> Nouvelles informations</h5>');
	print('<input type="text" name="zs_ref" placeholder="Référence" pattern="[A-Za-z0-9]{1,40}" required value="'.$ligne_uni_2['uni_ref'].'"/> <br /><br />');
	print('<select name="zl_immat">');
		print('<option value="'.$ligne_uni_3['veh_id'].'">'.$ligne_uni_3['veh_immat'].'</option>');
		while($ligne_uni_4=pg_fetch_assoc($rs_uni_4))
		{ print('<option value="'.$ligne_uni_4['veh_id'].'">'.$ligne_uni_4['veh_immat'].'</option>'); }
	print('</select>');
	print('</div>');

?>

<!-- <h5><i class="fa fa-user-circle"></i> Informations personnelles</h5>
<input type="text"  name="zs_nom" pattern="[a-zA-Zéèç-]{1,15}" placeholder="Nom" /><br /><br />
<input type="text"  name="zs_prenom" pattern="[a-zA-Zéèç-]{1,15}" placeholder="Prénom" /> <br /><br />
<input type="text"  name="zs_tel" id="tel" pattern="[0-9]{10}" placeholder="Téléphone" /> <br/><br />
<input type="text"  name="zs_mail" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$" placeholder="E-mail" /> -->