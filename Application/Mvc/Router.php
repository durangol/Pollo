<?php
namespace Pollo\Application\Mvc;

use \Pollo\Application\Mvc\Router\RouterInterface;
use \Pollo\Request\RequestInterface;

/**
 * A concrete router that implements the router interface
 */
class Router implements RouterInterface
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
     * @param Pollo\Application\Mvc\Router\RouterInterface $route
     */
    public function addRoute($key, RouteInterface $route)
    {
        $this->_routes[$key] = $route;
    }

    /**
     * A wrapper for for addRoute. Does the same thing but for an array of routes.
     * Adds an array of routes to the route collection
     * @param array $routes
     */
    public function addRoutes(array $routes)
    {
        foreach($routes as $key => $route) {
            $this->addRoute($key, $route);
        }
    }

    /**
     * Removes a route by key
     * @param string $key
     */
    public function removeRoute($key)
    {
        unset($this->_routes[$key]);
    }

    /**
     * Runs through the routes and sets the route object to the request on the first match
     * @param  \Pollo\Request\Abstract $request
     * @return bool
     */
    public function matchRoute(Request $request)
    {
        $foundRoute = false;
        foreach ($this->_routes as $route) {
            if ($route->match($request)) {
                $request->setRoute($route);
                $foundRoute = true;
                break;
            }
        }
        return $foundRoute;
    }
}