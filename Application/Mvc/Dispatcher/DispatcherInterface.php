<?php
namespace Pollo\Application\Mvc\Dispatcher;

/**
 * The Dispatcher interface
 */
interface DispatcherInterface
{
    /**
     * This function should handle the instantiation of a controller.
     * The details should be passed in through a concrete dispatcher from the request.
     */
	public function dispatch();
}