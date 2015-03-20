<!-- pas de header à mettre -->


<!--
	traitement du message d'erreur avec les variables :
	
	$message_arg : le message
	$message_type : 'OK' ou 'ERROR' (pour la mise en forme)
-->



<!-- bouton pour créer un cadre
	href : commande/index
	
	important : griser le bouton si l'utilisateur n'a pas encore précisé
	son adresse postale (formulaire juste en dessous)
	variable booléenne : $adresse_complete
-->

<!--
	formulaire d'édition du profil
	method : POST
	action : profil/editCheck
	nom des champs : (non définis)
	
	les champs seront précomplétés grace à la variable $user,
	qui est une instance de la classe Users.
-->

<!--
	historique des commandes (on affiche tout, on ne s'embête pas avec une pagination)
	
	sous forme de tableau
	
	les données se trouvent dans la variable $commandes qu'il faut parcourir (foreach).
-->