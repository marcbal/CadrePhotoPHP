<?php
/**
* Largement inspiré par panique-mvc
* @link https://github.com/panique/php-mvc
*/
class Profil extends Controleur{

	public function __construct() {
		parent::__construct();
	}

	public function index($args)
	{
		if (!Session::isLogin())
			$this->login($args);
		else
		{
			header('Location: '.URL.'actualite');
			exit();
		}
	}


	public function deconnexion($args)
	{	// déconnexion puis redirection vers la page de login
		Session::destroy();
		header('Location: '.URL.'actualite');
		exit();
	}



	public function loginCheck($args)
	{
		if (Session::isLogin())
		{
			echo 'Vous êtes déjà connecté';
			return;
		}
		$mail = $_POST['mail'];
		$pass = $_POST['pass'];
		parent::loadModel('Users');
		if(($r = Session::login($mail, $pass)) === true)
			header('Location: '.URL.'profil');
		else
			header('Location: '.URL.'profil/login/'.$r);
	}







	public function registerCheck($args)
	{
		if (Session::isLogin())
		{
			echo 'Vous êtes déjà connecté';
			return;
		}
		$mail = $_POST['mail'];
		$pass = $_POST['pass'];
		$pass2 = $_POST['pass2'];
		$username = $_POST['username'];
		parent::loadModel('Users');
		if(($r = Session::register($mail, $pass, $pass2, $username)) === true)
			header('Location: '.URL.'profil');
		else
			header('Location: '.URL.'profil/register/'.$r);
	}













	public function editCheck($args)
	{
		if (!Session::isLogin())
		{
			header('Location: '.URL.'profil');
			exit();
		}
		$id = Session::get('user_id');

		parent::loadModel('Users');
		
		$users = new UsersSQL();
		$user = $users->findById($id);



	}








}
