<?php
/**
 * Created by PhpStorm.
 * User: vladdoroshchuk
 * Date: 1/26/19
 * Time: 2:33 PM
 */

namespace src\notifications;

use src\interfaces\NotificationInterface;

class BlockBookSystemNotification extends Notification implements NotificationInterface
{
    /**
     * @return string
     * @throws \Exception
     */
    public function send(){
        if (!isset($this->params['user_id'])){
            throw new \Exception('Missing parameter user_id!');
        }
        return "System notification on the site: \"{$this->message()}\" was send to author:" . $this->params['user_id'];
    }

    /**
     * @return string
     */
    private function message(){
        return "Your book with Id: \"{$this->params['book_id']}\" was blocked by moderator: {$this->params['moderator_id']} for a reason: {$this->params['comment']}";
    }
    
}
