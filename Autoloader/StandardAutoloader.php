<?php

namespace Pollo\Autoloader;
require_once (__DIR__ . '/AutoloaderInterface.php');

/**
 * This is the standard autoloader that the framework will use. This implementation has support for namespaces.
 */
class StandardAutoloader implements AutoloaderInterface
{
    /**
     * An associative array for namespace paths
     * @var array
     */
    protected $_namespacePaths = array();

    public function __construct(array $namespacePaths = array())
    {
        $this->addNamespacePaths($namespacePaths);
    }

    /**
     * Checks if a class exists and autoloads it. If the namespace of the class
     * exists as a key in the array, check if the file exists and autoload it.
     * Otherwise it will continue through the array of paths and check if the file exists.
     * @param string $class
     * @return bool
     */
    public function autoload($class)
    {
        $didAutoload = false;
        $file = str_replace('\\', DIRECTORY_SEPARATOR, $class);

        $namespace = strstr($file, DIRECTORY_SEPARATOR, true);
        $relativePath = strstr($file, DIRECTORY_SEPARATOR) . '.php';

        if (isset($this->_namespacePaths[$namespace])) {
            if (file_exists($this->_namespacePaths[$namespace] . $relativePath)) {
                require_once($this->_namespacePaths[$namespace] . $relativePath);
                $didAutoload = true;
            }
        }
        
        if (!$didAutoload) {
            foreach ($this->_namespacePaths as $path) {
                if (file_exists($path . $relativePath)) {
                    require_once($path . $relativePath);
                    $didAutoload = true;
                    break;
                }
            }
        }
        
        return $didAutoload;
    }

    public function addNamespacePath($namespace, $path)
    {
        $this->_namespacePaths[$namespace] = rtrim($path, DIRECTORY_SEPARATOR);
    }

    public function addNamespacePaths(array $namespacePaths)
    {
        foreach ($namespacePaths as $namespace => $path) {
            $this->addNamespacePath($namespace, $path);
        }
    }

    public function removeNamespacePath($namespace)
    {
        unset($this->_namespacePaths[$namespace]);
    }
}