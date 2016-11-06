<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require 'vendor/autoload.php';

use mhndev\order\entities\common\Product;
use mhndev\order\entities\common\Store;
use mhndev\order\repositories\mongo\OrderRepository;
use mhndev\order\repositories\mongo\ProductRepository;
use mhndev\order\repositories\mongo\StoreRepository;
use MongoDB\Client;



$mongoDriver = new \mhndev\order\MongoDriverManager();
$config = include "config/mongo.php";

$mongoDriver->addClient(new Client($config['driver']['master']['host'] ), 'master' );

$mongoClient = $mongoDriver->byClient('master');
$db = $mongoClient->selectDatabase('order');
$storeRepository = new StoreRepository( $db, 'stores');

$store = Store::fromOptions(['name' => 'digipeyk']);
$savedStore = $storeRepository->insert($store);


//create 3 product
$products[] = Product::fromOptions(['name' => 'transport', 'price' => '12000' ]);
$products[] = Product::fromOptions(['name' => 'laptop' , 'price' => '13000']);
$products[] = Product::fromOptions(['name' => 'mobile', 'price' => '12500']);


$productRepository = new ProductRepository($db, 'products');


$orderRepository   = new OrderRepository($db, 'orders');

$order = $orderRepository->createAnOrderFor('qf354g436b34qq132r', $store);



$orderRepository->attachProductToAnOrder($order, $products);


//shipping
