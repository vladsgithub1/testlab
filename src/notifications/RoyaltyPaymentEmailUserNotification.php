<?php
/**
 * Created by PhpStorm.
 * User: vladdoroshchuk
 * Date: 1/26/19
 * Time: 2:33 PM
 */

namespace src\notifications;

use src\interfaces\NotificationInterface;

class RoyaltyPaymentEmailUserNotification extends Notification implements NotificationInterface
{

    /**
     * @return string
     * @throws \Exception
     */
    public function send(){
        if (!isset($this->params['email']) ||
            !isset($this->params['payment_amount']) ||
            !isset($this->params['payment_currency']) ||
            !isset($this->params['payment_details'])){
            throw new \Exception('Missing required parameter!');
        }

        return "Notification: \"{$this->message()}\" was send to email of user: " . $this->params['email'];
    }

    /**
     * @return string
     */
    private function message(){
        return "Your request for the amount: {$this->params['payment_amount']}{$this->params['payment_currency']} with details: {$this->params['payment_details']} accepted";
    }

}
