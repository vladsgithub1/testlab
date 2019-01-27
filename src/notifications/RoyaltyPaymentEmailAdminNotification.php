<?php
/**
 * Created by PhpStorm.
 * User: vladdoroshchuk
 * Date: 1/26/19
 * Time: 2:33 PM
 */

namespace src\notifications;

use src\interfaces\NotificationInterface;

class RoyaltyPaymentEmailAdminNotification extends Notification implements NotificationInterface
{
    /**
     * @var string
     */
    private $adminEmailDefault = 'admin@site.com';

    /**
     * @return string
     * @throws \Exception
     */
    public function send(){
        $adminEmail = !empty($this->params['admin_email']) ? $this->params['admin_email'] : $this->adminEmailDefault;
        if (!isset($this->params['payment_amount']) ||
            !isset($this->params['payment_currency']) ||
            !isset($this->params['payment_details']) ||
            !isset($this->params['user_id'])){
            throw new \Exception('Missing required parameter!');
        }

        return "Notification: \"{$this->message()}\" was send to email of admin: " . $adminEmail;
    }

    /**
     * @return string
     */
    private function message(){
        return "A request of user: {$this->params['user_id']} for the amount: {$this->params['payment_amount']}{$this->params['payment_currency']} with details: {$this->params['payment_details']} accepted";
    }
    
}
