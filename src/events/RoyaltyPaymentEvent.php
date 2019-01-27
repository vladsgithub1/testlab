<?php
namespace src\events;

/**
 * Created by PhpStorm.
 * User: vladdoroshchuk
 * Date: 1/26/19
 * Time: 1:29 PM
 */
class RoyaltyPaymentEvent extends Event
{
    /**
     * @var array
     */
    protected $notificationsTypes = ['royalty_payment_email_user_notification', 'royalty_payment_email_admin_notification'];
    
}
