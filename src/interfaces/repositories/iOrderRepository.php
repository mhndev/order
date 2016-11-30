<?php

namespace mhndev\order\interfaces\repositories;
use mhndev\order\interfaces\entities\iEntityOrder;

/**
 * Interface iOrderRepository
 * @package mhndev\order\interfaces
 */
interface iOrderRepository
{


    /**
     * @param $identifier
     * @return iEntityOrder
     */
    function findByIdentifier($identifier);

    /**
     * @param $ownerIdentifier
     * @param null $offset
     * @param null $limit
     * @return  array []iEntityOrder
     */
    function findByOwnerIdentifier($ownerIdentifier, $offset = null, $limit = null, array $sort = []);

    /**
     * @param $ownerIdentifier
     * @param $startDate
     * @param $endDate
     * @param null $offset
     * @param null $limit
     * @return mixed
     */
    function findByOwnerAndDate($ownerIdentifier, $startDate, $endDate, $offset = null, $limit = null, array $sort = []);


    /**
     * @param $orderIdentifier
     * @param $status
     * @return iEntityOrder
     */
    function changeStatus($orderIdentifier, $status);

    /**
     * @param iEntityOrder $order
     * @return iEntityOrder
     */
    function insert(iEntityOrder $order);

    /**
     * @param iEntityOrder $order
     *
     * @return iEntityOrder
     * @throws \InvalidArgumentException
     */
    function update(iEntityOrder $order);


    /**
     * @param $identifier
     * @return mixed
     */
    function deleteByIdentifier($identifier);

}
