<?php
/**
 * Created by PhpStorm.
 * User: marcel
 * Date: 08.11.17
 * Time: 12:54
 */


require __DIR__.'/vendor/autoload.php';

use php\OrderHandler;
use php\OrderRepository;
use php\Share;

$mysqli = new mysqli('127.0.0.1', 'root', 'Deutschrock1', 'wallstreet');

$orderRepository = new OrderRepository($mysqli);
echo print_r($orderRepository->getOrdersForShare(new Share('böah', 3.5)), true);

$test = new OrderHandler();
echo "muh";