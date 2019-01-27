<?php
/**
 * Created by PhpStorm.
 * User: vladdoroshchuk
 * Date: 1/26/19
 * Time: 1:30 PM
 */
require_once "autoload.php";

use src\events\EventsFactoryMethod;
use src\logs\LogEventMySQL;
use src\logs\LogEventFile;

/**
 * @param $id
 * @param $comment
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

    EventsFactoryMethod::makeEvent('block_book', $params)->run();

    print_r("---------- block book(with logging into a file) ----------\n");
    $logEvent = new LogEventFile();

    EventsFactoryMethod::makeEvent('block_book', $params)->run($logEvent);
}

/**
 * @param $userId
 */
function wrongPassword($userId)
{

    $params = [
        'user_id' => $userId,
        'email' => 'user@site.com'
    ];

    $logEvent = new LogEventMySQL();

    EventsFactoryMethod::makeEvent('wrong_password', $params)->run($logEvent);
}

/**
 * @param $userId
 * @param $payment_amount
 * @param $payment_currency
 * @param $payment_details
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

    EventsFactoryMethod::makeEvent('royalty_payment', $params)->run($logEvent);
}

print_r("---------- block book ----------\n");
blockBook(1, 'plagiarism', 2, 3);
print_r("---------- wrong password ----------\n");
wrongPassword(123);
print_r("---------- royalty payment ----------\n");
royaltyPayment(123, 100, "$", "Vice");

