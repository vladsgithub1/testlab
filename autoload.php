<?php
/**
 * Created by PhpStorm.
 * User: vladdoroshchuk
 * Date: 1/26/19
 * Time: 1:30 PM
 */

/**
 * autoloader
 * @param $class
 */
function my_autoloader($class)
{
    $filename = '' . str_replace('\\', '/', $class) . '.php';
    include($filename);
}
spl_autoload_register('my_autoloader');
