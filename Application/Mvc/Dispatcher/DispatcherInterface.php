<?php
namespace Pollo\Application\Mvc\Dispatcher;

use Pollo\Response\ResponseInterface;

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

    /**
     * This function should retrieve a request object
     * @return \Pollo\Request\RequestInterface
     */
    public function getRequest();

    /**
     * This function should retrieve a response object
     * @return \Pollo\Response\ResponseInterface
     */
    public function getResponse();

    /**
     * This should allow for changing the Response object at runtime
     * @param \Pollo\Response\ResponseInterface
     */
    public function setResponse(ResponseInterface $response);
}