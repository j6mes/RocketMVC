<?php

namespace JumpKick\Mvc;

class RouteSpecification implements Route {
	
	private $pattern;
	private $params;
	private $defaultcontroller;
	private $defaultaction;
	
	function __construct($urlpattern,$defaultcontroller="Default",$defaultaction="Index") {
		$this->pattern = $urlpattern;
		
		$this->defaultcontroller = $defaultcontroller;
		$this->defaultaction = $defaultaction;
	}
	
	
	
	function matches($url) {
		preg_match_all ("/{[^}]+}*/", $this->pattern,$segments);
		$segments = str_replace(array("{","}"), "", $segments[0]);
		
		
		$regexpattern = preg_replace ("/{[^}]+}*/", "([A-Za-z0-9-\s\;]+)", $this->pattern);
		$regexpattern = str_replace("/", "\\/", $regexpattern);

		preg_match("/^".$regexpattern."$/",$url,$matches);
		
		if(count($matches) == 0) {
			return FALSE;
		} else {			
			if(count($segments)) {
				unset($matches[0]);
				if(count($segments)!=count($matches)) {
					return FALSE;
				}
				$matches = array_values($matches);			
				$this->params = array_combine($segments,$matches);
				
				return count($this->params)>0;
			} else {
				return true;
			}
		}
	
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
		return $this->defaultcontroller;
	}
	
	function getDefaultAction() {
		return $this->defaultaction;
	}
}
	

