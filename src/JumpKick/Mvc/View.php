<?php 
namespace JumpKick\Mvc;

class View
{
	public $context;
	private $global;
    private $title = "";
    private $template = "template";
    public  $approot = "JumpKick/TinyType";


	public function renderNoView() {
		require_once("{$this->approot}/Template/{$this->template}.php");
	}

	public function render($name, $model)
	{

		require_once("{$this->approot}/View/{$name}.php");
	
		$this->content = ob_get_clean();


		require_once("{$this->approot}/Template/{$this->template}.php");
	}


    public function setTemplate($template) {
        $this->template = $template;
    }
	
	public function partial($name,$model)
	{
		ob_start();
		require_once("JumpKick/TinyType/ViewPartial/{$name}.php");
		$this->partial[$name] = ob_get_clean();
		
	}
	
	public function add($k,$v)
	{
		$this->global[$k]=$v;
	}
	
	
	public function json($arg=array())
	{
		die (json_encode($arg));
	} 
	
	
	
}
