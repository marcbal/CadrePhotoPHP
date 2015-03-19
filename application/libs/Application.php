<?php
/**
* Largement inspiré par panique-mvc
* @link https://github.com/panique/php-mvc
*/
class Application {
	private $url_controller = null;
	private $url_action = null;
	private $url_args = null;
	public $url_appli;




	public function __construct()
	{
		$this->splitUrl();
		if (file_exists('./application/controleur/' . $this->url_controller . '.php')) {
			require './application/controleur/' . $this->url_controller . '.php';
			$controleur = new $this->url_controller();
			if (method_exists($controleur, $this->url_action)) {
				$controleur->{$this->url_action}($this->url_args);
			} else {
				$controleur->index($this->url_args);
			}
		} else {
			require './application/controleur/accueil.php';
			$home = new Accueil();
			$home->index(null);
		}
	}






	private function splitUrl()
	{
		if (isset($_GET['url'])) {
			$url = rtrim($_GET['url'], '/');
			$url_appli = $url;
			$url = filter_var($url, FILTER_SANITIZE_URL);
			$url = explode('/', $url);
			$this->url_controller = (isset($url[0]) ? $url[0] : null);
			$this->url_action = (isset($url[1]) ? $url[1] : null);
			array_shift($url);
			array_shift($url);
			$this->url_args = (empty($url))?null:$url;
		}
	}
}
