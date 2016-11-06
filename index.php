<?php

require 'vendor/autoload.php';


use MongoDB\Client;

$mongoDriver = new \mhndev\order\MongoDriverManager();

$config = include "config/mongo.php";

$mongoDriver->addClient(new Client($config['driver']['host'] ), 'master' );


$storeRepository = new \mhndev\order\repositories\mongo\StoreRepository($mongoDriver->byClient('master')->selectDatabase('order'), 'stores');

$store = \mhndev\order\entities\mongo\Store::fromOptions(['name' => 'digipeyk']);

$result = $storeRepository->store($store);

//Kint::dump($result);
//die();
