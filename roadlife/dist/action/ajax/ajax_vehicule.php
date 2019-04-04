<?php

	$num= $_GET['veh_id'];

	include('../../fonctions/connect.php');
	$idc=connect();

	$sql_veh = "SELECT veh_id, veh_immat FROM t_vehicule WHERE veh_id=".$num." ORDER BY veh_immat;";
	$rs_veh = pg_query($idc,$sql_veh);
	$ligne_veh_2 = pg_fetch_assoc($rs_veh);

	print('<h5> <i class="fa fa-bus"></i> Nouvelle immatriculation </h5>');
	print('<input type="text"  name="zs_immat"  placeholder="Immatriculation" pattern="^[A-Z]{2}[-][0-9]{3}[-][A-Z]{2}$" required value="'.$ligne_veh_2['veh_immat'].'"/><br />');

?>