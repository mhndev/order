## Order Service

```php
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

```
