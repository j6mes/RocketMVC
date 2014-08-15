<?php
namespace JumpKick\Mvc;

class Controller
{
	public $context;
	public $view;
	
	function __construct()
	{
		$this->view = new View();
		$this->view->context = $this;
	}	
	
	function template()
	{
		
		$this->content = ob_get_clean();
		
		require_once("application/templates/template.php");
	}
	
}

