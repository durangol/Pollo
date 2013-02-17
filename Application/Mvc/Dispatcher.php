<?php
namespace \Pollo\Application\Mvc;
use \Pollo\Application\Mvc\Dispatcher\Interface;

class Dispatcher implements Interface
{

	protected $_request;

	protected $_response;

	public function __construct(\Pollo\Request\Interface $request, \Pollo\Response\Interface $response)
	{
		$this->_request = $request;
		$this->_response = $response;
	}
	public function dispatch()
	{
        if (!$route = $this->_request->getRoute()) {
            throw new \BadMethodCallException('There is no route set to the request. Set a route to the request first before dispatching.');
        }

        $controllerName = $route->getControllerName();
        $controller = new $controllerName($request, $response);

        $actionName = $route->getActionName();
        $controller->$actionName();
	}

}