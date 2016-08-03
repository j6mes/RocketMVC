<?php

namespace JumpKick\Mvc;

class ApiRouteSpecification extends RouteSpecification {	
	
	
	function invoke($url) {
		if(!isset($this->params['controller'])) {
			$this->params['controller'] = $this->getDefaultController();
		}
		
		if(!isset($this->params['action']) || strlen($this->params['action'])==0) {
			$this->params['action'] = $this->getDefaultAction();
			
		}
		
		
		return new RouteInstance("Api\\".$this->params['controller']."Controller",strtolower($_SERVER['REQUEST_METHOD']),$this->params);
	}
	
	
	
}
	

