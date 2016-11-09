<?php

namespace mhndev\order\repositories\mongo;

use mhndev\order\entities\mongo\Order;
use mhndev\order\interfaces\entities\iEntityOrder;
use mhndev\order\interfaces\repositories\iOrderRepository;
use MongoDB\BSON\ObjectID;
use MongoDB\Operation\FindOneAndUpdate;

/**
 * Class OrderRepository
 * @package mhndev\order\repositories\mongo
 */
class OrderRepository extends aRepository implements iOrderRepository
{

    /**
     * @param $identifier
     * @return iEntityOrder
     */
    function findByIdentifier($identifier)
    {
        $result = $this->gateway->findOne(['_id' => new ObjectID($identifier) ]);

        $order = new \mhndev\order\entities\common\Order($result);
        $order->setIdentifier($identifier);

        return $order;
    }

    /**
     * @param $ownerIdentifier
     * @param null $offset
     * @param null $limit
     * @return []iEntityOrder
     */
    function findByOwner($ownerIdentifier, $offset = null, $limit = null)
    {
        return $this->gateway->find(['owner' => $ownerIdentifier])->toArray();
    }

    /**
     * @param $ownerIdentifier
     * @param $startDate
     * @param $endDate
     * @param null $offset
     * @param null $limit
     * @return mixed
     */
    function findByOwnerAndDate($ownerIdentifier, $startDate, $endDate, $offset = null, $limit = null)
    {
        // TODO: Implement findByOwnerAndDate() method.
    }

    /**
     * @param $orderIdentifier
     * @param $status
     * @return iEntityOrder
     */
    function changeStatus($orderIdentifier, $status)
    {
        $result = $this->gateway->findOneAndUpdate(
            ['_id' => new ObjectID($orderIdentifier)],
            ['$set'=>['status' => $status]],
            ['returnDocument' => FindOneAndUpdate::RETURN_DOCUMENT_AFTER]
        );

        return new \mhndev\order\entities\common\Order($result);
    }

    /**
     * @param iEntityOrder $order
     * @return iEntityOrder
     */
    function insert(iEntityOrder $order)
    {
        $orderMongo = new Order($order);

        $res = $this->gateway->insertOne($orderMongo);

        $order->setIdentifier($res->getInsertedId()->__toString());

        return $order;
    }

    /**
     * @param iEntityOrder $order
     *
     * @return iEntityOrder
     * @throws \InvalidArgumentException
     */
    function update(iEntityOrder $order)
    {

        $result =  $this->gateway->findOneAndUpdate(
            ['_id' => new ObjectID($order->getIdentifier()) ],
            ['$set'=>\Poirot\Std\cast($order)->toArray()],
            ['returnDocument' => FindOneAndUpdate::RETURN_DOCUMENT_AFTER]
        );

        return new \mhndev\order\entities\common\Order($result);
    }

}
