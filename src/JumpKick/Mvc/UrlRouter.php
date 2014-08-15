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
			
		} else {
			die("No routes");
		}
	}
	
	function getUrlForRoute($route) {
	}

}
