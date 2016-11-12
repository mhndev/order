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
     * @param bool $returnArray
     * @param null $offset
     * @param null $limit
     * @return  []iEntityOrder
     */
    function findByOwnerIdentifier($ownerIdentifier, $returnArray = false, $offset = null, $limit = null);

    /**
     * @param $ownerIdentifier
     * @param bool $returnArray
     * @param $startDate
     * @param $endDate
     * @param null $offset
     * @param null $limit
     * @return mixed
     */
    function findByOwnerAndDate($ownerIdentifier, $returnArray = false, $startDate, $endDate, $offset = null, $limit = null);


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
