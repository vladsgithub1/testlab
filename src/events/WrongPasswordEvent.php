<?php
namespace src\events;

/**
 * Created by PhpStorm.
 * User: vladdoroshchuk
 * Date: 1/26/19
 * Time: 1:29 PM
 */
class WrongPasswordEvent extends Event
{
    /**
     * @var array
     */
    protected $notificationsTypes = ['wrong_password_email_user_notification'];
    
}
