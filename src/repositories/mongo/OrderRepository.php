<?php

namespace mhndev\order\repositories\mongo;

use mhndev\order\entities\mongo\Order;
use mhndev\order\interfaces\entities\iEntityOrder;
use mhndev\order\interfaces\repositories\iOrderRepository;
use MongoDB\BSON\ObjectID;
use MongoDB\Driver\Cursor;
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

        $order = $this->objectToObject($result, \mhndev\order\entities\common\Order::class);

        $order->setIdentifier($identifier);

        return $order;
    }

    /**
     * @param $ownerIdentifier
     * @param null $offset
     * @param null $limit
     * @return array []iEntityOrder
     */
    function findByOwnerIdentifier($ownerIdentifier, $offset = null, $limit = null)
    {
        $condition = ['ownerIdentifier' => $ownerIdentifier];

        $options = [];

        if($offset || $limit){
            $options['skip'] = $offset ? $offset : 0;
            $options['limit']  = $limit  ? $limit  : 10;
        }

        $count = $this->gateway->count($condition);

        $result = $this->gateway->find($condition, $options)->toArray();

        $return = [];

        $return['total'] = $count;

        foreach ($result as $record){
            $return['data'][] = $this->objectToObject($record, \mhndev\order\entities\common\Order::class);
        }

        return $return;
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
        /** @var Order $orderMongo */
        $orderMongo = $this->objectToObject($order, Order::class);

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
            ['$set'=>$order->objectToArray($order)],
            ['returnDocument' => FindOneAndUpdate::RETURN_DOCUMENT_AFTER]
        );

        return new \mhndev\order\entities\common\Order($result);
    }


    /**
     * @param $identifier
     * @return \MongoDB\DeleteResult
     */
    function deleteByIdentifier($identifier)
    {
        return $this->gateway->deleteOne(['_id' => new ObjectID($identifier)]);
    }

}
