<?php
namespace JumpKick\Mvc;

abstract class WebApp {
	public $s;	
	private $router; 
	
	function __construct()
	{
		$this->router = new UrlRouter();
		$this->initRoutes($this->router);
		$this->initAuthentication();

		$url = "";
		if(isset($_GET['url'])) {
			$url = $_GET['url'];
		}
		
		$route = $this->router->getRouteForUrl($url);
		if(isset($route)) {
			$routeimpl = $route->invoke($url);
			$controllerName = $this->getControllerNamespace() . "\\" . $routeimpl->getController();
			
			$controller = new $controllerName();
			$controller->{$routeimpl->getAction()}();
		} else {
			die("No route to page");
		}
	}

	protected abstract function getControllerNamespace(); 
	protected abstract function initAuthentication();
	protected abstract function initRoutes($router);
	
}


//@list($controller,$null) = explode(".",$controller);
		
		
	
		/*
		 * 
		 * 
		 * //Get Base URL 
		$baseURL = explode("&url=",$_SERVER['QUERY_STRING']);
		if(isset($baseURL[1]))
		{
			$baseURL = str_replace($baseURL[1], "", $_SERVER['REQUEST_URI']);
		}
		else
		{
			$baseURL = "/";	
		}
		
		 * 
		 * 
		 * 
		 * 
		if(!strlen($controller))
		{
			$controller = $this->getControllerNamespace() . "\DefaultController";
		}
			//Lets try and load our controller now
			try
			{
				$controller = new $controller;
				$controller->parent = $this;
			}
			catch(AuthException $e)
			{
				unset($controller);
		
				$_SESSION['goto'] = $_SERVER['REQUEST_URI'];
				
				$controller = new Index;
				$controller->parent = $this;
				$controller->err($e->getMessage());
				die;
			}
			catch(Exception $e)
			{
				header("Location:/");
			}
						
		*/

