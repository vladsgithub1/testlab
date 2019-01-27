<?php
namespace src\notifications;

/**
 * Created by PhpStorm.
 * User: vladdoroshchuk
 * Date: 1/26/19
 * Time: 1:29 PM
 */

class NotificationsFactoryMethod {

    /**
     * @param $notificationName
     * @param $params
     * @return null|BlockBookSystemNotification|RoyaltyPaymentEmailAdminNotification|RoyaltyPaymentEmailUserNotification|WrongPasswordEmailUserNotification
     */
    public static function makeNotification($notificationName, $params) {
        switch ($notificationName) {
            case "royalty_payment_email_user_notification":
                $event = new RoyaltyPaymentEmailUserNotification($params);
                break;
            case "royalty_payment_email_admin_notification":
                $event = new RoyaltyPaymentEmailAdminNotification($params);
                break;
            case "block_book_system_notification":
                $event = new BlockBookSystemNotification($params);
                break;
            case "wrong_password_email_user_notification":
                $event = new WrongPasswordEmailUserNotification($params);
                break;
            default:
                $event = null;
                break;
        }
        return $event;
    }
    
}
