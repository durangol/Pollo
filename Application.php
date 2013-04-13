<?php
namespace Pollo;

use \Pollo\Application\Mvc\Bootstrap\BootstrapInterface as Bootstrap;
use \Pollo\Application\Mvc\FrontController;
use \Pollo\Application\Mvc\Dispatcher\DispatcherInterface as Dispatcher;
use \Pollo\Application\Mvc\Router\RouterInterface as Router;

/**
 * A facade to provide a simple interface for a Pollo Application
 */
class Application
{
    /**
     * An instance of a Bootstrap
     * @var \Pollo\Application\Bootstrap\BootstrapInterface
     */
    protected $_bootstrap;

    /**
     * An instance of a Router
     * @var \Pollo\Application\Mvc\Router\RouterInterface
     */

    /**
     * An instance of the a Dispatcher
     * @var \Pollo\Application\Mvc\Dispatcher\DispatcherInterface
     */
    protected $_dispatcher;

    /**
     * The environment varaible
     * @var string
     */
    protected $_environment;

    /**
     * Constructor
     * @param \Pollo\Application\Bootstrap\BootstrapInterface       $bootstrap
     * @param \Pollo\Application\Mvc\Dispatcher\DispatcherInterface $dispatcher
     * @param string                                                $environment
     */
    public function __construct(Bootstrap $bootstrap, Router $router, Dispatcher $dispatcher, $environment)
    {
        $this->_bootstrap = $bootstrap;
        $this->_router = $router;
        $this->_dispatcher = $dispatcher;
        $this->_environment = $environment;
    }

    /**
     * Run the application
     */
    public function run()
    {
        $this->_bootstrap->run($this->_environment);
        FrontController::getInstance()->setBootstrap($this->_bootstrap)
                                      ->setRouter($this->_router) 
                                      ->setDispatcher($this->_dispatcher)
                                      ->dispatch();
    }
}