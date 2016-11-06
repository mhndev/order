<?php

namespace mhndev\order\repositories\mongo;

use mhndev\order\entities\mongo\Order;
use mhndev\order\entities\common\Item;
use mhndev\order\interfaces\entities\iEntity;
use mhndev\order\interfaces\entities\iOrderEntity;
use mhndev\order\interfaces\entities\iStoreEntity;
use mhndev\order\interfaces\repositories\iOrderRepository;

/**
 * Class OrderRepository
 * @package mhndev\order\repositories\mongo
 */
class OrderRepository extends aRepository implements iOrderRepository
{

    /**
     * @param $identifier
     * @return iOrderEntity
     */
    function getOrderByIdentifier($identifier)
    {
        // TODO: Implement getOrderByIdentifier() method.
    }

    /**
     * @param array $filters
     * @return array
     */
    function listOrders(array $filters)
    {
        // TODO: Implement listOrders() method.
    }

    /**
     * @param iOrderEntity $order
     * @return iOrderEntity
     */
    function createNewOrder(iOrderEntity $order)
    {
        // TODO: Implement createNewOrder() method.
    }

    /**
     * @param iOrderEntity $order
     * @return iOrderEntity
     */
    function updateAnOrder(iOrderEntity $order)
    {
        // TODO: Implement updateAnOrder() method.
    }

    /**
     * @param $identifier
     * @return mixed
     */
    function findByIdentifier($identifier)
    {
        // TODO: Implement findByIdentifier() method.
    }

    /**
     * @param $identifier
     * @return mixed
     */
    function deleteByIdentifier($identifier)
    {
        // TODO: Implement deleteByIdentifier() method.
    }


    /**
     * @param iEntity $entity
     * @return iEntity|false
     */
    function insert(iEntity $entity)
    {
        $storageAwareObject = $this->convertObject($entity, new Order());

        $result = $this->gateway->insertOne($storageAwareObject);

        if($result->getInsertedCount() == 1){
            return $result->getInsertedId();
        }
        else{
            return false;
        }
    }

    /**
     * @param $ownerIdentifier
     * @param iStoreEntity $fromStore
     * @return Order
     */
    function createAnOrderFor($ownerIdentifier, iStoreEntity $fromStore)
    {
        $order = new Order();

        $order->setOwnerIdentifier($ownerIdentifier);
        $order->setStore($fromStore);

        $result = $this->insert($order);

        return $order;
    }


    /**
     * @param iOrderEntity $order
     * @param array $products
     * @return bool
     */
    function attachProductToAnOrder(iOrderEntity $order, array $products)
    {
        $itemRepository = new ItemRepository($this->db, 'items');


        foreach ($products as $product)
        {
            $item = new Item([ 'product' => $product, 'order' => $order ]);
            $itemRepository->insert($item);
            $order->addItem($item);
        }

        return true;
    }



}
