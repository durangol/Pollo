<?php

namespace Pollo\Autoloader;

/**
 * An interface for autoloaders
 */
interface AutoloaderInterface
{
    /**
     * This will be the function that will be used to autoload a class 
     * @param string $class
     */
    function autoload($class);
}