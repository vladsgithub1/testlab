<?php
namespace src\events;

/**
 * Created by PhpStorm.
 * User: vladdoroshchuk
 * Date: 1/26/19
 * Time: 1:29 PM
 */
class BlockBookEvent extends Event
{
    /**
     * @var array
     */
    protected $notificationsTypes = ['block_book_system_notification'];
    
}
