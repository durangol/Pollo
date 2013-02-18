<?php
namespace \Pollo\Application\Mvc;
use \Pollo\Application\Mvc\Dispatcher\Interface;

/**
 * A concrete Dispatcher
 */
class Dispatcher implements Interface
{
    /**
     * The request object in which the dispatcher will handle
     * @var \Pollo\Request\Interface
     */
	protected $_request;

    /**
     * The response object in which the dispatcher will handle
     * @var \Pollo\Response\Interface
     */
	protected $_response;

    /**
     * Constructor
     * @param \Pollo\Request\Interface  $request  The request object
     * @param \Pollo\Response\Interface $response The response object
     */
	public function __construct(\Pollo\Request\Interface $request, \Pollo\Response\Interface $response)
	{
		$this->_request = $request;
		$this->_response = $response;
	}

    /**
     * The dispatch function. This will get the route from the request to get the proper controller, instantiate it and call the correct action.
     */
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