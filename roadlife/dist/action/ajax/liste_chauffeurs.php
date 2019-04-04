<?php
	include('../../fonctions/connect.php');
	$idc = connect();
	
	$sp_id=$_GET['num'];
	$sql="SELECT cf_id, cf_nom FROM t_chauffeur WHERE sp_id = ".$sp_id.";";
	
	$rs=pg_query($idc,$sql);

	echo('<select id="zl_cf" class="form-control">
		<option value="0">Sélectionner un chauffeur</option>');
		while ($ligne = pg_fetch_assoc($rs))
		{
			echo ('<option value="'.$ligne['cf_id'].'">'.$ligne['cf_nom'].'</option>');
		}
	echo('</select>');
?>
