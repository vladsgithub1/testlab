<?php
/**
 * Created by PhpStorm.
 * User: vladdoroshchuk
 * Date: 1/26/19
 * Time: 1:30 PM
 */
require_once "autoload.php";

use src\interfaces\EventInterface;
use src\events\EventsFactoryMethod;
use src\logs\LogEventMySQL;
use src\logs\LogEventFile;

/**
 * @param $id
 * @param $comment
 * @param $moderator_id
 * @param $user_id
 * @throws Exception
 */
function blockBook($id, $comment, $moderator_id, $user_id)
{
    //$book = Book::findOne($id);
    // .......
    
    $params = [
        'moderator_id' => $moderator_id,
        'user_id' => $user_id,
        'book_id' => $id,
        'comment' => $comment,
        'email' => 'user@site.com'
    ];

    $event = EventsFactoryMethod::makeEvent('block_book', $params);
    
    if(!$event instanceof EventInterface){
        throw new Exception('wrong event type!');
    }
    $event->run();
    
    print_r("---------- block book(with logging into a file) ----------\n");
    $logEvent = new LogEventFile();

    if(!$event instanceof EventInterface){
        throw new Exception('wrong event type!');
    }

    $event->run($logEvent);
}

/**
 * @param $userId
 * @throws Exception
 */
function wrongPassword($userId)
{

    $params = [
        'user_id' => $userId,
        'email' => 'user@site.com'
    ];

    $logEvent = new LogEventMySQL();

    $event = EventsFactoryMethod::makeEvent('wrong_password', $params);
    
    if(!$event instanceof EventInterface){
        throw new Exception('wrong event type!');
    }
    
    $event->run($logEvent);
}

/**
 * @param $userId
 * @param $payment_amount
 * @param $payment_currency
 * @param $payment_details
 * @throws Exception
 */
function royaltyPayment($userId, $payment_amount, $payment_currency, $payment_details)
{
    $params = [
        'user_id' => $userId,
        'payment_amount' => $payment_amount,
        'payment_currency' => $payment_currency,
        'payment_details' => $payment_details,
        'email' => 'user@site.com'
    ];
    
    $logEvent = new LogEventMySQL();

    $event = EventsFactoryMethod::makeEvent('royalty_payment', $params);

    if(!$event instanceof EventInterface){
        throw new Exception('wrong event type!');
    }

    $event->run($logEvent);
}

print_r("---------- block book ----------\n");
blockBook(1, 'plagiarism', 2, 3);

print_r("---------- wrong password ----------\n");
wrongPassword(123);

print_r("---------- royalty payment ----------\n");
royaltyPayment(123, 100, "$", "Visa");
