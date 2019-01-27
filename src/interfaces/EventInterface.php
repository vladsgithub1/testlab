<?php
namespace src\interfaces;
/**
 * Created by PhpStorm.
 * User: vladdoroshchuk
 * Date: 1/26/19
 * Time: 2:53 PM
 */

interface EventInterface
{
    /**
     * @param LogInterface|null $logEvent
     * @param array $notificationsTypes
     */
    public function run(LogInterface $logEvent = null, array $notificationsTypes = []);
    
}
