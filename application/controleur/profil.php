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
		{
			header('Location: '.URL.'accueil/index/not_logged_in');
			exit();
		}
		
		
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
		$username = $_POST['username'];
		parent::loadModel('Users');
		if(($r = Session::register($mail, $pass, $pass2, $username)) === true)
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
			header('Location: '.URL.'profil');
			exit();
		}
		$id = Session::get('user_id');

		parent::loadModel('Users');
		
		$users = new UsersSQL();
		$user = $users->findById($id);



	}








}
