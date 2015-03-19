<?php



class Commande extends Controleur{

	public function __construct() {
		parent::__construct();
	}
	
	
	
	
	
	
	function index($args)
	{
		
		
		/*
		parent::loadModel('Commandes');
		$cmd = new Commandes(...);
		$cmd->save();
		*/
		
		require 'application/vue/_template/header.php';
		require 'application/vue/commande/index.php';
		require 'application/vue/_template/footer.php';
	}


}