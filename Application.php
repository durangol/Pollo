<?php
namespace Pollo;

use \Pollo\Application\Bootstrap;
use \Pollo\Application\FrontController;

/**
 * A facade to provide a simple interface
 */
class Application
{
    /**
     * An instance of a Bootstrap
     * @var \Pollo\Application\Bootstrap
     */
    protected $_bootstrap;

    /**
     * An instance of a FrontController
     * @var \Pollo\Application\Mvc\FrontController
     */
    protected $_frontController;

    /**
     * The environment varaible
     * @var string
     */
    protected $_environment;

    /**
     * Constructor
     * @param \Pollo\Application\Bootstrap              $bootstrap
     * @param \Pollo\Application\Mvc\FrontController    $frontController
     * @param string                                    $environment
     */
    public function __construct(Bootstrap $bootstrap, FrontController $frontController, $environment)
    {
        $this->_bootstrap = $bootstrap;
        $this->_frontController = $frontController;
        $this->_environment = $environment;
    }

    /**
     * Run the application
     */
    public function run()
    {
    }
}