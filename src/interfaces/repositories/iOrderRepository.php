<?php

namespace mhndev\order\interfaces\repositories;
use mhndev\order\interfaces\entities\iOrderEntity;

/**
 * Interface iOrderRepository
 * @package mhndev\order\interfaces
 */
interface iOrderRepository extends iRepository
{
    /**
     * @param $identifier
     * @return iOrderEntity
     */
    function getOrderByIdentifier($identifier);

    /**
     * @param array $filters
     * @return array
     */
    function listOrders(array $filters);

    /**
     * @param iOrderEntity $order
     * @return iOrderEntity
     */
    function createNewOrder(iOrderEntity $order);

    /**
     * @param iOrderEntity $order
     * @return iOrderEntity
     */
    function updateAnOrder(iOrderEntity $order);


}
