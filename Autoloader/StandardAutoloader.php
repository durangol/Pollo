<?php

namespace Pollo\Autoloader;
require_once (__DIR__ . '/AutoloaderInterface.php');

class StandardAutoloader implements AutoloaderInterface
{
    public function autoload($class)
    {
        require_once(str_replace('\\', '/', $class) . '.php');
    }
}