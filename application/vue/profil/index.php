

	<?php if(Session::isLogin() && $adresse_complete): ?>
		<form method="GET" action="commande/index">
			<input class="command" type="submit" value="Commander un cadre" />
		</form>
	<?php else: ?>
		 <h3> Vous devez indiquer une adresse pour pouvoir commander </h2>
	<?php endif; ?>
	
	<br/>
	
	<form method="POST" action="profil/editCheck">
	
		<fieldset title="Modifier mon profil" >
		<legend>Modifier mon profil</legend>
		
		<label for="mail">Email :</label>
		<input name="mail" id="mail" type="email" value="<?php echo $user->user_email ?>" required/><br/><br/>
		
		<label for="pass">Password :</label>
		<input name="pass" id="pass" type="password"/><br/><br/>
		
		<label for="phone">Num de telephone :</label>
		<input name="phone" id="phone" type="text" value="<?php if($user->user_phone != null){ echo $user->user_phone; }?>" required placeholder="Aucun actuellement"/><br/><br/>
		
		<label for="address">Adresse :</label>
		<input name="address" id="address" type="text" value="<?php if($user->user_address != null){ echo $user->user_address; } ?>" required placeholder="Aucun actuellement"/><br/><br/>
			
		<input id="submit" type="submit" value="Valider"/>
		</fieldset><br/>
		
		<fieldset title="Anciennes commandes">
		<legend>Anciennes commandes</legend>
		
		<!-- data:image/png;base64,ton_of_crap -->
		<?php  foreach($commandes as $commande){
		echo "<img src='".$commande->photo."' class='last_commands'/>";
		}
		//<!-- GARDER LE CLASS /!\ important /!\ -->
		?>
		
		
		</fieldset>
	</form>

<!--
	traitement du message d'erreur avec les variables :
	
	$message_arg : le message
	$message_type : 'OK' ou 'ERROR' (pour la mise en forme)
-->



<!-- bouton pour créer un cadre
	href : commande/index
	
	important : désactiver le bouton si l'utilisateur n'a pas encore précisé
	son adresse postale (formulaire juste en dessous)
	variable booléenne : $adresse_complete
-->

<!--
	formulaire d'édition du profil
	method : POST
	action : profil/editCheck
	nom des champs : mail, adresse (multiligne)
	
	les champs seront précomplétés grace à la variable $user,
	qui est une instance de la classe Users.
-->

<!--
	historique des commandes (on affiche tout, on ne s'embête pas avec une pagination)
	
	sous forme de tableau
	
	les données se trouvent dans la variable $commandes qu'il faut parcourir (foreach).
-->