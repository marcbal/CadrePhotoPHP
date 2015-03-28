<!DOCTYPE html>
<html lang="fr"
      dir="ltr">
	<head>
		<meta charset="utf-8"/>
		<title>Bilderamme</title>
		<base href="<?php echo URL; ?>" />
		<!-- Lien vers le fichier style -->
		<link rel="stylesheet" href="public/template_accueil.css" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
		
	<body>

		<img id="logo" src="public/Logo.png"/>
		
		
		
		
		
		<!--
			traitement du message d'erreur avec les variables :
			
			$message_arg : le message
			$message_type : 'OK' ou 'ERROR' (pour la mise en forme)
		-->
		
		<p> <?php echo $message_arg; ?> </p>
			
		<table>
			<tr>
				<!-- Formulaire enregistrement -->	
				<td>
					<form id="f1" method="POST" action="profil/loginCheck/">
					
					<label for="mail">Email :</label>
					<input name="mail" type="email" required/><br/><br/>
					
					<label for="pass">Password :</label>
					<input name="pass" type="password" required/><br/><br/>
					
					<input id="submit" type="submit" value="Connexion"/>
					</form>
				</td>
			
				<!-- Formulaire connexion -->
				<td>
					<form method="POST" action="profil/registerCheck/">
					
					<label for="mail">Email :</label>
					<input name ="mail" type="email" required/><br/><br/>					
					
					<label for="pass">Password :</label>
					<input name="pass" type="password" required/><br/><br/>
					
					<label for="pass2">Confirmation :</label>
					<input name="pass2" type="password" required/><br/><br/>

					<input id="submit" type="submit" value="Inscription"/>
					</form>
				
				</td>
				
			</tr>
		</table>
	</body>
</html>
