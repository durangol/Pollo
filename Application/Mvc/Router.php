<?php
namespace \Pollo\Application\Mvc;

use \Pollo\Application\Mvc\Router\RouteInterface;

class Router
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

    public function addRoute(RouteInterface $route)
    {
        $this->_routes[] = $route;
    }

    public function addRoutes(array $routes)
    {
        foreach($routes as $route) {
            $this->addRoute($routes);
        }
    }

    public function removeRoute($route)
    {

    }

    public function matchRoute($request)
    {
        
    }
}