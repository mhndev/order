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

        $order = $this->objectToObject($result, \mhndev\order\entities\common\Order::class);

        $order->setIdentifier($identifier);

        return $order;
    }

    /**
     * @param $ownerIdentifier
     * @param bool $returnArray
     * @param null $offset
     * @param null $limit
     * @return array []iEntityOrder
     */
    function findByOwnerIdentifier($ownerIdentifier, $returnArray = false, $offset = null, $limit = null)
    {
        $condition = ['ownerIdentifier' => $ownerIdentifier];

        $options = [];

        if($offset || $limit){
            $options['skip'] = $offset ? $offset : 0;
            $options['limit']  = $limit  ? $limit  : 10;
        }

        $result = $this->gateway->find($condition, $options)->toArray();

        $return = [];
        if($returnArray){
            foreach ($result as $record){
                $return[] = $record->objectToArray($record);
            }

            return $return;
        }

        return $result;
    }

    /**
     * @param $ownerIdentifier
     * @param bool $returnArray
     * @param $startDate
     * @param $endDate
     * @param null $offset
     * @param null $limit
     * @return mixed
     */
    function findByOwnerAndDate($ownerIdentifier, $returnArray = false, $startDate, $endDate, $offset = null, $limit = null)
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
     * @param $instance
     * @param $className
     * @return mixed
     */
    private function objectToObject($instance, $className)
    {
        return unserialize(sprintf(
            'O:%d:"%s"%s',
            strlen($className),
            $className,
            strstr(strstr(serialize($instance), '"'), ':')
        ));
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
