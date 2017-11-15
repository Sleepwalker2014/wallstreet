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

$mysqli = new mysqli('127.0.0.1', 'root', 'Deutschrock1', 'wallstreet');

$orderRepository = new OrderRepository($mysqli);

$loader = new Twig_Loader_Filesystem('html');
$twig = new Twig_Environment($loader);

$test = new OrderHandler($orderRepository);
$test->getBidsForOrder();

$template = $twig->load('dashboard.html.twig');
echo $template->render();