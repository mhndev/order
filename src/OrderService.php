<?php

namespace mhndev\order;

use mhndev\order\entities\common\Item;
use mhndev\order\entities\common\Order;
use mhndev\order\entities\common\Product;
use mhndev\order\entities\common\Shipping;
use mhndev\order\entities\common\Store;
use mhndev\order\interfaces\entities\iOrderEntity;
use mhndev\order\interfaces\entities\iProductEntity;
use mhndev\order\interfaces\entities\iShippingEntity;
use mhndev\order\interfaces\repositories\iItemRepository;
use mhndev\order\interfaces\repositories\iOrderRepository;
use mhndev\order\interfaces\repositories\iProductRepository;
use mhndev\order\interfaces\repositories\iShippingRepository;
use mhndev\order\interfaces\repositories\iStoreRepository;

/**
 * Class orderService
 * @package mhndev\order
 */
class OrderService
{

    const DEFAULT_SHOP = 'digipeyk';

    /**
     * @var iStoreRepository
     */
    protected $storeRepository;

    /**
     * @var iProductRepository
     */
    protected $productRepository;

    /**
     * @var iOrderRepository
     */
    protected $orderRepository;

    /**
     * @var iShippingRepository
     */
    protected $shippingRepository;

    /**
     * @var iItemRepository
     */
    protected $itemRepository;

    /**
     * orderService constructor.
     *
     * @param iStoreRepository $storeRepository
     * @param iProductRepository $productRepository
     * @param iOrderRepository $orderRepository
     * @param iShippingRepository $shippingRepository
     * @param iItemRepository $itemRepository
     */
    public function __construct(
        iStoreRepository $storeRepository,
        iProductRepository $productRepository,
        iOrderRepository $orderRepository,
        iShippingRepository $shippingRepository,
        iItemRepository $itemRepository
    )
    {
        $this->storeRepository = $storeRepository;
        $this->productRepository = $productRepository;
        $this->orderRepository = $orderRepository;
        $this->shippingRepository = $shippingRepository;
        $this->itemRepository = $itemRepository;
    }

    /**
     * @param string $name
     * @param integer $price
     * @param string $storeName
     * @return interfaces\entities\iEntity
     */
    function createProduct($name, $price, $storeName = self::DEFAULT_SHOP)
    {
        $store = $this->storeRepository->findOneByName($storeName);

        if(! $store){
            $store = Store::fromOptions(['name' => $storeName]);
            $result = $this->storeRepository->insert($store);
        }

        $product = Product::fromOptions(['name' => $name, 'price' => $price, 'store' => $store ]);

        $result = $this->productRepository->insert($product);

        return $product;
    }


    /**
     * @param array $products
     */
    function createProducts(array $products)
    {

    }


    /**
     * @param $ownerIdentifier
     * @return interfaces\entities\iEntity
     */
    function createAnOrderForOwner($ownerIdentifier)
    {
        $order = Order::fromOptions(['ownerIdentifier' => $ownerIdentifier]);


        $result = $this->orderRepository->insert($order);

        return $order;
    }

    /**
     * @param iOrderEntity $order
     * @param array $products
     * @return iOrderEntity
     */
    function attachProductsToAnOrder(iOrderEntity $order, array $products)
    {
        /** @var iProductEntity $product */
        foreach ($products as $product){

            $item = Item::fromOptions(['product' => $product, 'order' => $order, 'price' => $product->getPrice()]);
            $result = $this->itemRepository->insert($item);

            $order->addItem($item);
        }

        return $order;
    }


    /**
     * @param array $orders
     * @return mixed
     */
    function createAShippingAndAttachOrders(array $orders)
    {
        $shipping = Shipping::fromOptions(['issuedDate' => time()]);

        $this->shippingRepository->insert($shipping);

        $result = $this->attachOrdersToExistingShipping($shipping, $orders);

        return $result;
    }


    /**
     * @param iShippingEntity $shipping
     * @param array $orders
     * @return iShippingEntity
     */
    function attachOrdersToExistingShipping(iShippingEntity $shipping, array $orders)
    {
        foreach ($orders as $order){
            /** @var iOrderEntity $order */
            $order->setShipping($shipping);
        }

        return $shipping;
    }


}
