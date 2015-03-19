<?php



class Commande extends Controleur{

	public function __construct() {
		parent::__construct();
	}
	
	
	
	
	
	
	function index($args)
	{
		$url_appli = 'index';
		
		
		
		
		parent::loadModel('Commandes');
		
		$cmd = new Commandes(45234, 'sdthbsthstvhsgvhsz',
		$_POST['largeur'],
		$_POST['hauteur'],
		$_POST['marge'],
		$_POST['epaisseur'],
	$_POST['bordure_gauche_couleur'],
	$_POST['bordure_droite_couleur'],
	$_POST['bordure_haut_couleur'],
	$_POST['bordure_bas_couleur'],
	$_POST['bordure_gauche_type'],
	$_POST['bordure_droite_type'],
	$_POST['bordure_haut_type'],
	$_POST['bordure_bas_type']);
		
		
		$cmd->save();
		
		
		require 'application/vue/_template/header.php';
		require 'application/vue/commande/index.php';
		require 'application/vue/_template/footer.php';
	}


}