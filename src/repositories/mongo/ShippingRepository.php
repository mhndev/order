<?php

namespace mhndev\order\repositories\mongo;

use mhndev\order\entities\mongo\Shipping;
use mhndev\order\interfaces\entities\iEntity;
use mhndev\order\interfaces\repositories\iShippingRepository;

/**
 * Class ShippingRepository
 * @package mhndev\order\repositories\mongo
 */
class ShippingRepository extends aRepository implements iShippingRepository
{

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
     * @param $shipper
     * @return array|null
     */
    function findShippingsByShipper($shipper)
    {
        // TODO: Implement findShippingsByShipper() method.
    }

    /**
     * @param $start
     * @param $end
     * @return mixed
     */
    function findShippingByTimeInterval($start, $end)
    {
        // TODO: Implement findShippingByTimeInterval() method.
    }

    /**
     * @return array|null
     */
    function listShippings()
    {
        // TODO: Implement listShippings() method.
    }

    /**
     * @param iEntity $entity
     * @return iEntity|false
     */
    function insert(iEntity $entity)
    {
        $storageAwareObject = $this->convertObject($entity, new Shipping());

        $result = $this->gateway->insertOne($storageAwareObject);

        if($result->getInsertedCount() == 1){
            return $result->getInsertedId();
        }
        else{
            return false;
        }
    }
}
