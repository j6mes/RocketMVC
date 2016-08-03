<?php 
namespace JumpKick\Mvc;

class UrlRouter implements Router{
	
	private $routeSpecifications;
	private $fallbackRoute;
	function registerRoute($route) {
		$this->routeSpecifications []= $route;
	}

	function setFallback($route)
	{
		$this->fallbackRoute = $route;
	}


	function getRouteForUrl($url) {
		if(count($this->routeSpecifications)) {
			foreach($this->routeSpecifications as $route) {
				if($route->matches($url)) {
					
					return $route;
				}
			}

			if(isset($this->fallbackRoute)) {
				return $this->fallbackRoute;
			}
		} else {
			die("No routes");
		}
	}
	
	function getUrlForRoute($route) {
	}

}
