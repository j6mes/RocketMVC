<?php

namespace JumpKick\Mvc;

class RouteSpecification implements Route {
	
	private $pattern;
	private $params;
	
	
	function __construct($urlpattern) {
		$this->pattern = $urlpattern;
	}
	
	
	
	function matches($url) {
		preg_match_all ("/{[^}]+}*/", $this->pattern,$segments);
		$segments = str_replace(array("{","}"), "", $segments[0]);
		
		
		$regexpattern = preg_replace ("/{[^}]+}*/", "([A-Za-z0-9-\s\;]+)", $this->pattern);
		$regexpattern = str_replace("/", "\\/", $regexpattern);

		preg_match("/^".$regexpattern."$/",$url,$matches);
		
		unset($matches[0]);
		$matches = array_values($matches);
		
		if(count($segments)!=count($matches)) {
			return FALSE;
		}
		
		
		$this->params = array_combine($segments,$matches);
	
		return TRUE;
	}
	
	
	function invoke($url) {
		if(!isset($this->params['controller'])) {
			$this->params['controller'] = $this->getDefaultController();
		}
		
		if(!isset($this->params['action'])) {
			$this->params['action'] = $this->getDefaultAction();
		}
		
		return new RouteInstance($this->params['controller']."Controller",$this->params['action'],$this->params);
	}
	
	
	function getDefaultController() {
		return "Default";
	}
	
	function getDefaultAction() {
		return "Default";
	}
}
	

