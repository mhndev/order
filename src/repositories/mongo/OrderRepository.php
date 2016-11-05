<?php

namespace mhndev\order\repositories\mongo;

use mhndev\order\interfaces\entities\iOrderEntity;
use mhndev\order\interfaces\repositories\iOrderRepository;

/**
 * Class OrderRepository
 * @package mhndev\order\repositories\mongo
 */
class OrderRepository implements iOrderRepository
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
}
