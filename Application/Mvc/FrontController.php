<?php

namespace Pollo\Application\Mvc;
use \Pollo\Application\Mvc\Bootstrap\BootstrapInterface;
use \Pollo\Application\Mvc\Dispatcher\DispatcherInterface;
use \Pollo\Application\Mvc\Router\RouterInterface;

class FrontController
{
    /**
     * Singleton
     * @var \Pollo\Application\Mvc\FrontController
     */
    protected static $_instance;

    /**
     * An instance of a Bootstrap
     * @var \Pollo\Application\Mvc\Bootstrap\BootstrapInterface
     */
    protected $_bootstrap;

    /**
     * An instance of a Router
     * @var \Pollo\Application\Mvc\Router\RouterInterface
     */
    protected $_router;

    /**
     * An instance of a Dispatcher
     * @var \Pollo\Application\Mvc\Dispatcher\DispatcherInterface
     */
    protected $_dispatcher;

    /**
     * Singleton requires a protected constructor
     */
    protected function __construct()
    {
    }

    /**
     * Retrieve Singleton instance
     * @return FrontController
     */
    public static function getInstance()
    {
        if (self::$_instance === null) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Set Bootstrap
     * @param BootstrapInterface $bootstrap
     * @return $this
     */
    public function setBootstrap(BootstrapInterface $bootstrap)
    {
        $this->_bootstrap = $bootstrap;
        return $this;
    }

    /**
     * Set Router
     * @param RouterInterface $router
     * @return $this
     */
    public function setRouter(RouterInterface $router)
    {
        $this->_router = $router;
        return $this;
    }

    /**
     * Set Dispatcher
     * @param DispatcherInterface $dispatch
     * @return $this
     */
    public function setDispatcher(DispatcherInterface $dispatch)
    {
        $this->_dispatcher = $dispatch;
        return $this;
    }

    /**
     * Dispatch the application
     */
    public function dispatch()
    {
        $request = $this->_dispatcher->getRequest();
        if ($this->_router->matchRoute($request)) {
            try {
                $this->_dispatcher->dispatch();
            }
            catch (\BadFunctionCallException $e) {
                // Set Error Controller
                // Set Error Object
                // Set Request/Response
            }
            $this->_dispatcher->getResponse()->send();
        }
    }
}