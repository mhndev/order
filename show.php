<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'vendor/autoload.php';

$mongoDriver = new \mhndev\order\MongoDriverManager();
$config = include "config/mongo.php";


$mongoDriver->addClient(new MongoDB\Client($config['driver']['master']['host'] ), 'master' );

$mongoClient = $mongoDriver->byClient('master');
$db = $mongoClient->selectDatabase('order');

$orderRepository = new mhndev\order\repositories\mongo\OrderRepository($db, 'orders');

/** @var \mhndev\order\entities\common\Order $result */
$result = $orderRepository->findByIdentifier($_GET['id']);

$array = $result->objectToArray($result);

echo json_encode($array);
exit;
