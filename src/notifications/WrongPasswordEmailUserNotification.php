<?php
/**
 * Created by PhpStorm.
 * User: vladdoroshchuk
 * Date: 1/26/19
 * Time: 2:33 PM
 */

namespace src\notifications;

use src\interfaces\NotificationInterface;

class WrongPasswordEmailUserNotification extends Notification implements NotificationInterface
{
    /**
     * @return string
     * @throws \Exception
     */
    public function send(){
        if (!isset($this->params['email'])){
            throw new \Exception('Missing parameter email!');
        }
        return "Notification: \"{$this->message()}\" was send to email to user: " . $this->params['email'];
    }

    /**
     * @return string
     */
    private function message(){
        return "An attempt was made to log in with your 
        username and the wrong password was entered 
        3 times in a row.";
    }
    
}
