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

//$_POST = [
//    'status' => 26,
//    'ownerIdentifier' => 312425634531413,
//    'date' => time(),
//    'items' => [
//        [
//            'itemType' => 'transport',
//            'itemIdentifier' => 1,
//            'price' => 8200,
//            'extra' => [
//                'from' => [ 'lat' => 37.324532, 'lon' => 51.23434 ],
//                'to' => [ 'lat' => 51.34234, 'lon' => 51.23434 ]
//            ]
//        ],
//        [
//            'itemType' => 'transport',
//            'itemIdentifier' => 2,
//            'price' => 10000,
//            'extra' => [
//                'from' => [ 'lat' => 37.324532, 'lon' => 51.23434 ],
//                'to' => [ 'lat' => 51.34234, 'lon' => 51.23434 ]
//            ]
//        ]
//
//    ]
//];

/**
{
"ownerIdentifier": "24rf2rf3",

"items":[
 {
 "extra":{
  "from":{"lat":37.3452,"lon":51.324546},
  "to":{"lat":3734231,"lon":51.32454}
  },
  "itemType": "peik",
  "itemIdentifier": "2",
  "price":10000

  }

]

}
 */


$input = json_decode(file_get_contents('php://input'), true);


$order = \mhndev\order\entities\common\Order::fromOptions($input);


header('Content-type: application/json');

//$order->buildByOptions($_POST);

/** @var \mhndev\order\entities\common\Order $result */
$result = $orderRepository->insert($order);

echo json_encode($result->objectToArray($result));
