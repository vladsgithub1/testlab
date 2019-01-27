<?php
/**
 * Created by PhpStorm.
 * User: vladdoroshchuk
 * Date: 1/26/19
 * Time: 2:33 PM
 */

namespace src\notifications;

class Notification
{
    /**
     * @var array
     */
    protected $params;

    /**
     * Notification constructor.
     * @param array $params
     */
    function __construct(array $params = [])
    {
        $this->params = $params;
    }
    
}
