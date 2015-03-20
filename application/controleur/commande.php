<?php



class Commande extends Controleur{

	public function __construct() {
		parent::__construct();
	}
	
	
	
	
	
	/**
	 * Correspond à la page de réalisation du cadre, avec la photo
	 *
	 */
	function index($args)
	{
		
		if (!Session::isLogin())
		{
			header('Location: '.URL.'accueil/index/not_logged_in');
			exit();
		}
		
		require 'application/vue/_template/header.php';
		require 'application/vue/commande/index.php';
		require 'application/vue/_template/footer.php';
	}
	
	
	
	
	function paiement($args)
	{
		
		if (!Session::isLogin())
		{
			header('Location: '.URL.'accueil/index/not_logged_in');
			exit();
		}
		
		require 'application/vue/_template/header.php';
		require 'application/vue/commande/paiement.php';
		require 'application/vue/_template/footer.php';
	}
	
	
	
	function valider($args)
	{
		
		if (!Session::isLogin())
		{
			header('Location: '.URL.'accueil/index/not_logged_in');
			exit();
		}
		
		
		/*
		parent::loadModel('Commandes');
		$cmd = new Commandes(...);
		$cmd->save();
		*/
		
		
		
		
		require 'application/vue/_template/header.php';
		require 'application/vue/commande/valider.php';
		require 'application/vue/_template/footer.php';
	}


}