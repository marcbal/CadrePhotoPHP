<?php

class Commandes extends Table {
  public $user_id;
  public $photo;
  public $largeur;
  public $hauteur;
  public $marge;
  public $epaisseur;
  public $bordure_gauche_couleur;
  public $bordure_droite_couleur;
  public $bordure_haut_couleur;
  public $bordure_bas_couleur;
  public $bordure_gauche_type;
  public $bordure_droite_type;
  public $bordure_haut_type;
  public $bordure_bas_type;
  

  public function __construct($user_id, $photo, $largeur, $hauteur, $marge, $epaisseur,
	$bordure_gauche_couleur, $bordure_droite_couleur, $bordure_haut_couleur, $bordure_bas_couleur,
	$bordure_gauche_type, $bordure_droite_type, $bordure_haut_type, $bordure_bas_type) {
    parent::__construct();
	
	
  $this->user_id = $user_id;
  $this->photo = $photo;
  $this->largeur = $largeur;
  $this->hauteur = $hauteur;
  $this->marge = $marge;
  $this->epaisseur = $epaisseur;
  $this->bordure_gauche_couleur = $bordure_gauche_couleur;
  $this->bordure_droite_couleur = $bordure_droite_couleur;
  $this->bordure_haut_couleur = $bordure_haut_couleur;
  $this->bordure_bas_couleur = $bordure_bas_couleur;
  $this->bordure_gauche_type = $bordure_gauche_type;
  $this->bordure_droite_type = $bordure_droite_type;
  $this->bordure_haut_type = $bordure_haut_type;
  $this->bordure_bas_type = $bordure_bas_type;
	
  }
  
}
