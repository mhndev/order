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


$order = $orderRepository->findByIdentifier($_GET['id']);




$putfp = fopen('php://input', 'r');
$putdata = '';
while($data = fread($putfp, 1024))
    $putdata .= $data;
fclose($putfp);

$result = [];

parse_str($putdata, $result);

$result['status'] = (int)$result['status'];


foreach ($result as $key => $value){
    $order->{'set'.ucfirst($key)}($value);
}


$result = $orderRepository->update($order);
