<?php

namespace JumpKick\Mvc;

class RouteInstance {
	private $controller;
	function __construct($controller,$action) {
		$this->controller = $controller;
		$this->action = $action;
	}
	
	function getController() {
		return $this->controller;
	}
	
	function getAction() {
		return $this->action;
	}
	
	
}
	

