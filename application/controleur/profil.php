<?php
/**
* Largement inspiré par panique-mvc
* @link https://github.com/panique/php-mvc
*/
class Profil extends Controleur{

	public function __construct() {
		parent::__construct();
	}

	
	/*
		Arguments à prendre en compte :
		
		invalid_email
		email_exist
		empty_input_form
		modif_ok
		
	
	*/
	public function index($args)
	{
		if (!Session::isLogin())
		{
			header('Location: '.URL.'accueil/index/not_logged_in');
			exit();
		}
		
		$user_id = Session::get('user_id');
		$user_mail = Session::get('user_mail');
		
		parent::loadModel('Commandes');
		$commandesSQL = new CommandesSQL();
		$commandes = $commandesSQL->findByuser_id(Session::get('user_id'))->orderBy('id DESC')->execute();
		
		parent::loadModel('Users');
		$usersSQL = new UsersSQL();
		$user = $usersSQL->findById($user_id);
		
		$adresse_complete = !($user->user_address === null);
		
		
		$message_arg = null;
		$message_type = null;
		if (isset($args[0])) {
			if ($args[0] == 'invalid_email') {
				$message_arg = 'L\'e-mail indiqué n\'est pas valide';
				$message_type = 'ERROR';
			}
			if ($args[0] == 'invalid_password') {
				$message_arg = 'Le mot de passe indiqué est trop court';
				$message_type = 'ERROR';
			}
			if ($args[0] == 'email_exist') {
				$message_arg = 'L\'e-mail indiqué existe déjà dans la base de donnée';
				$message_type = 'ERROR';
			}
			if ($args[0] == 'empty_input_form') {
				$message_arg = 'Un des champs du formulaire est vide';
				$message_type = 'ERROR';
			}
			if ($args[0] == 'modif_ok') {
				$message_arg = 'Modifications enregistrés';
				$message_type = 'OK';
			}
		}
		
		
		$titre_page = "Bienvenue";
		
		
		
		
		require 'application/vue/_template/header.php';
		require 'application/vue/profil/index.php';
		require 'application/vue/_template/footer.php';
		
		
	}

	
	
	
	
	
	
	

	public function deconnexion($args)
	{	// déconnexion puis redirection vers la page de login
		Session::destroy();
		header('Location: '.URL.'accueil/index/logout_ok');
		exit();
	}



	public function loginCheck($args)
	{
		if (Session::isLogin())
		{
			header('Location: '.URL.'profil');
			return;
		}
		$mail = $_POST['mail'];
		$pass = $_POST['pass'];
		parent::loadModel('Users');
		if(($r = Session::login($mail, $pass)) === true)
			header('Location: '.URL.'profil');
		else
			header('Location: '.URL.'accueil/index/'.$r);
	}







	public function registerCheck($args)
	{
		if (Session::isLogin())
		{
			header('Location: '.URL.'profil');
			return;
		}
		$mail = $_POST['mail'];
		$pass = $_POST['pass'];
		$pass2 = $_POST['pass2'];
		parent::loadModel('Users');
		if(($r = Session::register($mail, $pass, $pass2)) === true)
		{
			$this->loginCheck($args);
		}
		else
			header('Location: '.URL.'accueil/index/'.$r);
	}













	public function editCheck($args)
	{
		if (!Session::isLogin())
		{
			header('Location: '.URL.'accueil/index/not_logged_in');
			exit();
		}
		
		if (empty($_POST['mail']) || empty($_POST['address']) || empty($_POST['phone']))
		{
			header('Location: '.URL.'profil/index/empty_input_form');
			exit();
		}
		
		$mail = $_POST['mail'];
		$address = $_POST['address'];
		$phone= $_POST['phone'];
		
		
		
		// validation du mail
		if (!NeverTrustUserInput::checkEmail($mail))
		{
			header('Location: '.URL.'profil/index/invalid_email');
			exit();
		}
		
		parent::loadModel('Users');
		
		// on vérifie si le mail existe dans la base de donnée
		$users = new UsersSQL();
		$user = $users->findByUser_email($mail)->execute();
		if ($mail != Session::get('user_mail') AND count($user) != 0) return 'email_exist';
		
		
		
		$id = Session::get('user_id');

		
		$users = new UsersSQL();
		$user = $users->findById($id);
		
		$user->user_email = $mail;
		$user->user_address = $address;
		$user->user_phone= $phone;
		if (!empty($_POST['pass'])) {
			$pass = $_POST['pass'];
			if (!NeverTrustUserInput::checkPasswordValidity($pass)) {
				header('Location: '.URL.'profil/index/invalid_password');
				exit();
			}
			
			$user->user_password_hash = password_hash($pass, PASSWORD_DEFAULT);
		}
		
		$user->save();
		
		// on n'oublie pas de mettre à jour les données de session
		Session::set('user_mail', $user->user_email);
		
		header('Location: '.URL.'profil/index/modif_ok');
	}
}
