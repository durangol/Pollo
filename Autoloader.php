<?php

namespace Pollo;
require_once __DIR__ . '/Autoloader/AutoloaderInterface.php';

class Autoloader
{
    protected $_autoloaders = array();

    public function __construct()
    {
        spl_autoload_register(array($this, 'autoload'));
    }

    public function autoload($class)
    {
        foreach($this->_autoloaders as $autoloader) {
            if ($autoloader instanceof \Pollo\Autoloader\Autoloaderinterface) {
                $autoloader->autoload($class);
            } 
            else if (is_callable($autoloader)) {
                $autoloader($class);
            }
        }
    }

    public function addAutoloader($autoloader)
    {
        if (!$autoloader instanceof \Pollo\Autoloader\AutoloaderInterface && !is_callable($autoloader)) {
            throw new \InvalidArgumentException('The autoloader must be callable or an instance of \\Pollo\\Autoloader\\AutoloaderInterface.');
        }
        $this->_autoloaders[] = $autoloader;
    }
}