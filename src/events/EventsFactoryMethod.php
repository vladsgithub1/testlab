<?php
namespace src\events;

/**
 * Created by PhpStorm.
 * User: vladdoroshchuk
 * Date: 1/26/19
 * Time: 1:29 PM
 */
class EventsFactoryMethod {

    /**
     * @param $eventName
     * @param $params
     * @return null|BlockBookEvent|RoyaltyPaymentEvent|WrongPasswordEvent
     */
    public static function makeEvent($eventName, $params) {
        $paramsWithEventName = array_merge($params, ['event_type' => $eventName]);
        
        switch ($eventName) {
            case "block_book":
                $event = new BlockBookEvent($paramsWithEventName);
                break;
            case "royalty_payment":
                $event = new RoyaltyPaymentEvent($paramsWithEventName);
                break;
            case "wrong_password":
                $event = new WrongPasswordEvent($paramsWithEventName);
                break;
            default:
                $event = null;
                break;
        }
        return $event;
    }
    
}
