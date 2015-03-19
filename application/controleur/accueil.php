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
		$url_appli = 'accueil';

		// pas de header et footer, déjà dans la page inclus ci-dessous
		require 'application/vue/accueil/index.php';
	}


}
