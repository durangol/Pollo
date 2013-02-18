<?php

namespace Pollo\Autoloader;
require_once (__DIR__ . '/AutoloaderInterface.php');

/**
 * This is the standard autoloader that the framework will use. This implementation has support for namespaces.
 */
class StandardAutoloader implements AutoloaderInterface
{
    /**
     * The autoloader implementation
     * @param string $class
     */
    public function autoload($class)
    {
        require_once(str_replace('\\', '/', $class) . '.php');
    }
}