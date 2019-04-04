<?php

	print('<h3 class="entete-form">Modifier mes informations personnelles</h3>');
	print('<h5>Utilisateur : '.$ligne_info['us_prenom'].' '.$ligne_info['us_nom']);
	print('<form name="frm" action="#" method="POST">');
		print('<div class="form-general">');
			print('<div class="part-form-1">');
				print('<h5><i class="fa fa-user-circle"></i> Informations personnelles</h5>');
				print('<input type="text"  name="zs_nom" pattern="[a-zA-Zéèç-]{1,15}" required placeholder="Nom" value="'.$ligne_info['us_nom'].'"/><br /><br />');
				print('<input type="text"  name="zs_prenom" pattern="[a-zA-Zéèç-]{1,15}" required placeholder="Prénom" value="'.$ligne_info['us_prenom'].'"/> <br /><br />');
				// print('<input type="password"  name="zs_actuel_mdp" id="tel" pattern="[0-9]{10}" required placeholder="Mot de passe actuel" /> <br/><br />');
				// print('<input type="password"  name="zs_nouveau_mdp" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$" required placeholder="Nouveau mot de passe" /><br/><br />');
				print('<input type="mail"  name="zs_mail" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$" required placeholder="E-mail" value="'.$ligne_info['us_mail'].'"/>');
			print('</div>');
		print('</div>');
		print('<div class="part-form-3">');
			print('<input type="submit" value="VALIDER" class="btn btn-success"/> <input type="reset" value="RENITIALISER" class="btn btn-success"/>');
		print('</div>');
	print('</form>');

?>

<!-- <h5><i class="fa fa-user-circle"></i> Informations personnelles</h5>
<input type="text"  name="zs_nom" pattern="[a-zA-Zéèç-]{1,15}" placeholder="Nom" /><br /><br />
<input type="text"  name="zs_prenom" pattern="[a-zA-Zéèç-]{1,15}" placeholder="Prénom" /> <br /><br />
<input type="text"  name="zs_tel" id="tel" pattern="[0-9]{10}" placeholder="Téléphone" /> <br/><br />
<input type="text"  name="zs_mail" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$" placeholder="E-mail" /> -->