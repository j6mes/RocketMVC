<?php
namespace JumpKick\Mvc;

class Controller
{
	public $context;
	public $view;
	public $page;

	function __construct()
	{
        $clazz = get_called_class();

        $root = implode('/',explode('\\',$clazz,-2));

		$this->view = new View();
        $this->view->approot = $root;
		$this->view->context = $this;

        $this->page = 1;
        if(isset($_GET['page'])) {
            $this->page = max(intval($_GET['page']),1);

        }


        $GLOBALS['page'] =$this->page;
        $GLOBALS['resultsperpage'] =10;
	}
	
	function template()
	{
		$this->content = ob_get_clean();
		require_once("application/templates/template.php");
	}
	
}

