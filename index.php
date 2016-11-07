<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'vendor/autoload.php';

use mhndev\order\repositories\mongo\ItemRepository;
use mhndev\order\repositories\mongo\OrderRepository;
use mhndev\order\repositories\mongo\ProductRepository;
use mhndev\order\repositories\mongo\ShippingRepository;
use mhndev\order\repositories\mongo\StoreRepository;
use MongoDB\Client;


$mongoDriver = new \mhndev\order\MongoDriverManager();
$config = include "config/mongo.php";

$mongoDriver->addClient(new Client($config['driver']['master']['host'] ), 'master' );

$mongoClient = $mongoDriver->byClient('master');
$db = $mongoClient->selectDatabase('order');

$storeRepository = new StoreRepository( $db, 'stores');
$productRepository = new ProductRepository($db, 'products');
$orderRepository = new OrderRepository($db, 'orders');
$shippingRepository = new ShippingRepository($db, 'shippings');
$itemRepository = new ItemRepository($db, 'items');



$orderService = new \mhndev\order\OrderService(
    $storeRepository,
    $productRepository,
    $orderRepository,
    $shippingRepository,
    $itemRepository
);


$product = $orderService->createProduct('laptop', 2000);

$order = $orderService->createAnOrderForOwner('13cr31v432cr23');

$orderService->attachProductsToAnOrder($order, [$product]);

$orderService->createAShippingAndAttachOrders([$order]);
