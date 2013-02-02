<?php
namespace Pollo;

use \Pollo\Application\Bootstrap\Abstract as Bootstrap;
use \Pollo\Application\Mvc\FrontController;
use \Pollo\Application\Mvc\Dispatcher\Abstract as Dispatcher;

/**
 * A facade to provide a simple interface
 */
class Application
{
    /**
     * An instance of a Bootstrap
     * @var \Pollo\Application\Bootstrap\Abstract
     */
    protected $_bootstrap;

    /**
     * An instance of the a Dispatcher
     * @var \Pollo\Application\Mvc\Dispatcher\Abstract
     */
    protected $_dispatcher;

    /**
     * The environment varaible
     * @var string
     */
    protected $_environment;

    /**
     * Constructor
     * @param \Pollo\Application\Bootstrap\Abstract         $bootstrap
     * @param \Pollo\Application\Mvc\Dispatcher\Abstract    $dispatcher
     * @param string                                        $environment
     */
    public function __construct(Bootstrap $bootstrap, Dispatcher $dispatcher, $environment)
    {
        $this->_bootstrap = $bootstrap;
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
                                      ->setDispatcher($this->_dispatcher)
                                      ->dispatch();
    }
}