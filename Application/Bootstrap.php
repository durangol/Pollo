<?php
namespace \Pollo\Application;

use \Pollo\Application;

/**
 * A Bootstrap class to set up a Pollo Application
 */
class Boostrap
{
    /**
     * The application config object
     * @var \Pollo\Application\Config
     */
    protected $_config;

    /**
     * Constructor
     * @param \Pollo\Application\Config
     */
    public function __construct(Config $config)
    {
        $this->_config = $config;
    }

    /**
     * Returns the config object
     * @return \Pollo\Application\Config
     */
    public function getConfig()
    {
        return $this->_config;
    }

    /**
     * Bootstraps the application
     * @param string $environment
     */
    public function run($environment)
    {
        
    }
}

