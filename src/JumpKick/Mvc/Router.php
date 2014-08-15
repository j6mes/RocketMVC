<?php 
namespace JumpKick\Mvc;

interface Router{
	function registerRoute($route);
	function getRouteForUrl($url);
	function getUrlForRoute($route);
}
