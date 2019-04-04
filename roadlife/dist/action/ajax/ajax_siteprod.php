<?php

	$num= $_GET['sp_id'];

	include('../../fonctions/connect.php');
	$idc = connect();

	$sql_sp_1= "SELECT sp_id, sp_libelle FROM t_siteprod WHERE sp_id=".$num.";";
	$rs_sp_1 = pg_query($idc, $sql_sp_1);
	$ligne_sp_1=pg_fetch_assoc($rs_sp_1);

	print('<h5><i class="fa fa-question-circle"></i> Nouveau site de production</h5>');
	print('<input type="text" name="zs_sp_ville" placeholder="Ville" pattern="[A-Za-z]{1,40}" required value="'.$ligne_sp_1['sp_libelle'].'"/>');


?>

<!-- <h5><i class="fa fa-user-circle"></i> Informations personnelles</h5>
<input type="text"  name="zs_nom" pattern="[a-zA-Zéèç-]{1,15}" placeholder="Nom" /><br /><br />
<input type="text"  name="zs_prenom" pattern="[a-zA-Zéèç-]{1,15}" placeholder="Prénom" /> <br /><br />
<input type="text"  name="zs_tel" id="tel" pattern="[0-9]{10}" placeholder="Téléphone" /> <br/><br />
<input type="text"  name="zs_mail" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$" placeholder="E-mail" /> -->