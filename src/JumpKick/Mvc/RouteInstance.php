<?php

namespace JumpKick\Mvc;

class RouteInstance {
	private $controller;
	private $action;
	private $params;
	
	function __construct($controller,$action, $params) {
		$this->controller = $controller;
		$this->action = $action;
		$this->params = $params;
	}
	
	function getController() {
		return $this->controller;
	}
	
	function getAction() {
		return $this->action;
	}
	
	function getParams() {
		return $this->params;
	}
	
}
	

