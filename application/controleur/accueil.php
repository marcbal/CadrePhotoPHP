<?php
/**
* Largement inspir� par panique-mvc
* @link https://github.com/panique/php-mvc
*/
class Accueil extends Controleur{

	public function __construct() {
		parent::__construct();
	}
	
	
	/*
		Arguments à prendre en compte :
		
		not_logged_in
		logout_ok
		
		Login :
		
		invalid_email
		email_not_exist
		wrong_password
		
		Regiter :
		
		invalid_email
		invalid_password
		different_password
		email_exist
		
	
	*/
	public function index($args)
	{
		
		if (Session::isLogin())
		{	// la page d'accueil n'est accessible que pour les personnes non login
			header('Location: '.URL.'profil');
			return;
		}
		
		
		$message_arg = null;
		$message_type = null;
		if (isset($args[0])) {
			if ($args[0] == 'not_logged_in') {
				$message_arg = 'Vous n\'êtes pas connecté';
				$message_type = 'ERROR';
			}
			if ($args[0] == 'logout_ok') {
				$message_arg = 'Déconnecté avec succès';
				$message_type = 'OK';
			}
			if ($args[0] == 'invalid_email') {
				$message_arg = 'L\'e-mail indiqué n\'est pas valide';
				$message_type = 'ERROR';
			}
			if ($args[0] == 'email_not_exist') {
				$message_arg = 'L\'e-mail indiqué n\'existe pas';
				$message_type = 'ERROR';
			}
			if ($args[0] == 'wrong_password') {
				$message_arg = 'Le mot de passe n\'est pas bon';
				$message_type = 'ERROR';
			}
			if ($args[0] == 'invalid_password') {
				$message_arg = 'Le mot de passe n\'est pas valide, il doit faire au moins '.PASSWORD_MIN_SIZE.' caractères';
				$message_type = 'ERROR';
			}
			if ($args[0] == 'different_password') {
				$message_arg = 'Les deux mots de passes sont différents. Ils doivent être identiques.';
				$message_type = 'ERROR';
			}
			if ($args[0] == 'email_exist') {
				$message_arg = 'L\'email indiqué existe déjà';
				$message_type = 'ERROR';
			}
		}
		
		// pas de header et footer, déjà dans la page inclus ci-dessous
		require 'application/vue/accueil/index.php';
	}


}
