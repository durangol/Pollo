<?php

namespace Pollo;
require_once __DIR__ . '/Autoloader/AutoloaderInterface.php';

/**
 * A container for autoloaders that gets registered on the autoloader stack
 */
class Autoloader
{
    /**
     * autoloader container
     * @var array
     */
    protected $_autoloaders = array();

    /**
     * Optionally adds autoloaders to the array and registers itself to the
     * autoloader stack.
     * @param array $autoloaders An optional array of autoloaders to add
     */
    public function __construct(array $autoloaders = array())
    {
        foreach ($autoloaders as $key => $autoloader) {
            $this->addAutoloader($key, $autoloader);
        }
        spl_autoload_register(array($this, 'autoload'));
    }

    /**
     * checks each autoloader if its an instance of \Pollo\Autoloader\Autoloaderinterface
     * or if its callable. 
     * @param  string $class The path to the class you want to load 
     */
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

    /**
     * Add another autoloader
     * @param string $key        The index of the autoloader array
     * @param mixed $autoloader  An instance of Autoloader Interface or a callable 
     */
    public function addAutoloader($key, $autoloader)
    {
        if (!$autoloader instanceof \Pollo\Autoloader\AutoloaderInterface && !is_callable($autoloader)) {
            throw new \InvalidArgumentException('The autoloader must be callable or an instance of \\Pollo\\Autoloader\\AutoloaderInterface.');
        }
        $this->_autoloaders[$key] = $autoloader;
    }

    /**
     * removes Autoloader
     * @param  string $key The index of the autoloader you want to remove
     */
    public function removeAutoloader($key)
    {
        unset($this->_autoloaders[$key]);
    }
}