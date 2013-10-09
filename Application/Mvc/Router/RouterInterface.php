<?php

namespace Pollo\Application\Mvc\Router;

use Pollo\Request\RequestInterface;

/**
 * An interface for a Router that manages a collection of routes
 */
interface RouterInterface
{
    /**
     * This should check a Request and determine whether a route matched or not
     * @param RequestInterface $request
     * @return bool
     */
    public function matchRoute(RequestInterface $request);
}