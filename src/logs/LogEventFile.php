<?php
/**
 * Created by PhpStorm.
 * User: vladdoroshchuk
 * Date: 1/26/19
 * Time: 2:29 PM
 */

namespace src\logs;

use src\interfaces\LogInterface;

class LogEventFile implements LogInterface
{
    /**
     * @param $params
     * @return string
     */
    public function log($params) {
        return "Event logged to File with params: " . print_r($params, true);
    }
    
}
