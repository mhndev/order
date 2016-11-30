<?php

namespace mhndev\order\repositories\mongo;

use mhndev\order\entities\mongo\Order;
use mhndev\order\interfaces\entities\iEntityOrder;
use mhndev\order\interfaces\repositories\iOrderRepository;
use mhndev\order\OrderAccess;
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
        /** @var Order $result */
        $foundedOrder = $this->gateway->findOne(['_id' => new ObjectID($identifier) ]);
        $storageUnawareOrder = $foundedOrder->castTo(\mhndev\order\entities\common\Order::class);
        $storageUnawareOrder->identifier = $identifier;

        return $storageUnawareOrder;
    }


    /**
     * @param null $offset
     * @param null $limit
     * @return array
     */
    function listAll($offset = null, $limit = null, array $sort = [])
    {
        $options = [];

        if($offset || $limit){
            $options['skip'] = get($offset, 0);
            $options['limit']  = get($limit, 10);
        }


        if($sort){
            $options['sort'] = [$sort['sort'] => $sort['dir']];
        }

        $count = $this->gateway->count();
        $result = $this->gateway->find([], $options)->toArray();
        $return = [];
        $return['total'] = $count;

        /** @var Order $record */
        foreach ($result as $record){
            $return['data'][] = $record->castTo(\mhndev\order\entities\common\Order::class);
        }

        return $return;
    }


    /**
     * @param $ownerIdentifier
     * @param null $offset
     * @param null $limit
     * @return array []iEntityOrder
     */
    function findByOwnerIdentifier($ownerIdentifier, $offset = null, $limit = null, array $sort = [])
    {
        $condition = ['ownerIdentifier' => $ownerIdentifier];

        $options = [];

        if($offset || $limit) {
            $options['skip'] = $offset ? $offset : 0;
            $options['limit']  = $limit  ? $limit  : 10;
        }


        if($sort){
            $options['sort'] = [$sort['sort'] => $sort['dir']];
        }

        $count = $this->gateway->count($condition);

        $result = $this->gateway->find($condition, $options)->toArray();

        $return = [];

        $return['total'] = $count;

        /** @var Order $record */
        foreach ($result as $record){
            $return['data'][] = $record->castTo(\mhndev\order\entities\common\Order::class);
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
    function findByOwnerAndDate($ownerIdentifier, $startDate, $endDate, $offset = null, $limit = null, array $sort = [])
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
        /** @var \mhndev\order\entities\common\Order $order */
        $orderMongo = $order->castTo(Order::class);

        $res = $this->gateway->insertOne($orderMongo);

        $order->identifier = $res->getInsertedId()->__toString();

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
            ['$set'=>iterator_to_array($order)],
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
