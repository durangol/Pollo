<?php


/**
 * the directory in which your applications will live in
 */
$application = 'Application';

/**
 * the directory for Autoloader
 */
$autoloader = 'Autoloader';

/**
 *the directory for Core
 */
$core = 'Core';

// Define the absolute paths for configured directories
define('APPATH', realpath($application).DIRECTORY_SEPARATOR);
define('AUTOLOAD', realpath($autoloader).DIRECTORY_SEPARATOR);
define('CORE', realpath($core).DIRECTORY_SEPAEATOR);

//Bootsrap applications
require APPATH.'Bootstrap'.EXT;


?>