<?php
namespace Pollo;

class Dispatcher
{
	public static dispatch(){
		$requestURI = $_SERVER['REQUEST_URI'];
		$uri = explode('/',$requestURI);
		$controller = empty($uri[0])?'IndexController':lcfirst($uri[0]).'Controller';
		$method = empty($uri[1])?'IndexAction':lcfirst($uri[1]).'Action';
		$argument = empty($uri[2])?null:$uri[2];
		$instance = new $controller;
		$instance->$method($argument);
	}
}