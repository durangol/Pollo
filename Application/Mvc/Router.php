<?php
namespace \Pollo\Application\Mvc;

use \Pollo\Application\Mvc\Router\Interface;
use \Pollo\Request\Interface as Request;

/**
 * A concrete router that implements the router interface
 */
class Router implements Interface
{
    /**
     * Array of routes
     * @var array
     */
    protected $_routes = array();

    /**
     * Constructor
     * @param array $routes
     */
    public function __construct(array $routes = array())
    {
        $this->addRoutes($routes);
    }

    /**
     * Adds a route to the array of routes
     * @param Pollo\Application\Mvc\Router\Interface $route
     */
    public function addRoute(Interface $route)
    {
        $this->_routes[] = $route;
    }

    /**
     * A wrapper for for addRoute. Does the same thing but for an array of routes.
     * @param array $routes
     */
    public function addRoutes(array $routes)
    {
        foreach($routes as $route) {
            $this->addRoute($routes);
        }
    }

    /**
     * Removes a route
     * @param Pollo\Application\Mvc\Router\Interface $route
     */
    public function removeRoute(Interface $route)
    {

    }

    public function matchRoute(Request $request)
    {
        
    }
}