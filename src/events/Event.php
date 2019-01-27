<?php
namespace src\events;
use src\interfaces\EventInterface;
use src\interfaces\LogInterface;
use src\interfaces\NotificationInterface;
use src\logs\LogEventMySQL;
use src\notifications\NotificationsFactoryMethod;

/**
 * Created by PhpStorm.
 * User: vladdoroshchuk
 * Date: 1/26/19
 * Time: 1:29 PM
 */

class Event implements EventInterface
{
    /**
     * @var array
     */
    protected $params;

    /**
     * @var LogInterface
     */
    protected $logEvent;
    
    /**
     * @var array
     */
    protected $notificationsTypes = [];

    /**
     * Event constructor.
     * @param array $params
     */
    public function __construct(Array $params=array()){
        $this->params = $params;
    }

    /**
     * @param $property
     * @param $value
     * @return mixed
     */
    public function __set($property, $value){
        return $this->params[$property] = $value;
    }

    /**
     * @param $property
     * @return mixed|null
     */
    public function __get($property){
        return array_key_exists($property, $this->params) ? $this->params[$property] : null;
    }

    /**
     * @param array $notificationsNames
     * @throws \Exception
     */
    protected function sendNotifications(array $notificationsNames = []){
        foreach ($notificationsNames as $notificationName){
            $notification = NotificationsFactoryMethod::makeNotification($notificationName, $this->params);
            if(!$notification instanceof NotificationInterface){
                throw new \Exception('notification was not instanceof NotificationInterface');
            }
            print_r($notification->send() . "\n");
        }
    }

    /**
     * @throws \Exception
     */
    protected function saveLogs(){
        if (!$this->logEvent instanceof LogInterface) {
            throw new \Exception('logEvent was not instanceof LogInterface');
        }
        print_r($this->logEvent->log(array_merge($this->params)));
    }

    /**
     * @param LogInterface|null $logEvent
     * @param array $notificationsTypes
     * @throws \Exception
     */
    public function run(LogInterface $logEvent = null, array $notificationsTypes = []){
        $this->logEvent = $logEvent ? $logEvent : new LogEventMySQL();
        $this->notificationsTypes = $notificationsTypes ? $notificationsTypes : $this->notificationsTypes;
        $this->sendNotifications($this->notificationsTypes);
        $this->saveLogs();
    }
    
}
