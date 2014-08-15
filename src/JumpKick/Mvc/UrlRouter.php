<?php 
namespace JumpKick\Mvc;

class UrlRouter implements Router{
	
	private $routeSpecifications;
	
	function registerRoute($route) {
		$this->routeSpecifications []= $route;
	}
	
	function getRouteForUrl($url) {
		if(count($this->routeSpecifications)) {
			foreach($this->routeSpecifications as $route) {
				if($route->matches($url)) {
					return $route;
				}
			}
			
			
			
			/*
			if(isset($url[2]))
			{
				$url[1] = str_replace("__","",$url[1]);
				$controller->{$url[1]}($url[2]);
			}
			elseif(isset($url[1]))
			{
				$url[1] = str_replace("__","",$url[1]);
				$controller->{$url[1]}();
			}
			else
			{
				$controller->DefaultAction();	
			}
			 */		
		} else {
			die("No routes");
		}
	}
	
	function getUrlForRoute($route) {
	}
	
	/*
	 * 	if(isset($_GET['url']))
		{
			$url = explode("/",$_GET['url']);
		}

		if(isset($url[0]))
		{
			if($url[0]=="file.php")
			{
				$url[0] = "upload";
			}
		}
		else
		{
			$url[0] = "";
		}
	
		
	 */
}
