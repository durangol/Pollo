<?php

namespace Pollo\Application\Mvc\Router;

/**
 * An interface for a Router that manages a collection of routes
 */
interface RouterInterface
{
    public function addRoutes(array $routes);
}