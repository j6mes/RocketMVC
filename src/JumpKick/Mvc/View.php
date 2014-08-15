<?php 
namespace JumpKick\Mvc;

class View
{
	public $context;
	private $global;
	public function render($name, $args = array())
	{
		
		$this->args = $args;
		require_once("JumpKick/VoteMate/View/{$name}.php");
	
		$this->content = ob_get_clean();


		require_once("JumpKick/VoteMate/Template/template.php");
	}
	
	
	public function fragment($name,$args=array())
	{
		ob_start();
		$this->args = $args;
		require("application/fragments/{$name}.php");
		$this->fragments[$name][] = ob_get_clean();
		
	}
	
	public function add($k,$v)
	{
		$this->global[$k]=$v;
	}
	
	
	public function json($view,$arg=array())
	{
		
		die (json_encode($arg));
	} 
	
	
	
}
