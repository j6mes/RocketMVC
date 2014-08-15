<?php

namespace JumpKick\Mvc;

interface Route {
	function invoke($url);
	function matches($url);
	
	function getDefaultController();
	function getDefaultAction();
	
	
}
