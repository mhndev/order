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

$_POST = [
    'status' => 26,
    'ownerIdentifier' => 312425634531413,
    'date' => time(),
    'items' => [
        [
            'itemType' => 'transport',
            'itemIdentifier' => 1,
            'price' => 8200,
            'extra' => [
                'from' => [ 'lat' => 37.324532, 'lon' => 51.23434 ],
                'to' => [ 'lat' => 51.34234, 'lon' => 51.23434 ]
            ]
        ],
        [
            'itemType' => 'transport',
            'itemIdentifier' => 2,
            'price' => 10000,
            'extra' => [
                'from' => [ 'lat' => 37.324532, 'lon' => 51.23434 ],
                'to' => [ 'lat' => 51.34234, 'lon' => 51.23434 ]
            ]
        ]

    ]
];

$order = \mhndev\order\entities\common\Order::fromOptions($_POST);


//$order->buildByOptions($_POST);


Kint::dump($order);
die();

Kint::dump($order);
die();

$result = $orderRepository->insert($order);
