<!-- pas de header � mettre -->


<!--
	traitement du message d'erreur avec les variables :
	
	$message_arg : le message
	$message_type : 'OK' ou 'ERROR' (pour la mise en forme)
-->



<!-- bouton pour cr�er un cadre
	href : commande/index
	
	important : griser le bouton si l'utilisateur n'a pas encore pr�cis�
	son adresse postale (formulaire juste en dessous)
	variable bool�enne : $adresse_complete
-->

<!--
	formulaire d'�dition du profil
	method : POST
	action : profil/editCheck
	nom des champs : (non d�finis)
	
	les champs seront pr�compl�t�s grace � la variable $user,
	qui est une instance de la classe Users.
-->

<!--
	historique des commandes (on affiche tout, on ne s'emb�te pas avec une pagination)
	
	sous forme de tableau
	
	les donn�es se trouvent dans la variable $commandes qu'il faut parcourir (foreach).
-->