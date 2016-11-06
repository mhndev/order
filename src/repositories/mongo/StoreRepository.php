<?php

namespace mhndev\order\repositories\mongo;

use mhndev\order\entities\mongo\Store;
use mhndev\order\interfaces\entities\iEntity;
use mhndev\order\interfaces\entities\iStoreEntity;
use mhndev\order\interfaces\repositories\iStoreRepository;

/**
 * Class StoreRepository
 * @package mhndev\order\repositories\mongo
 */
class StoreRepository extends aRepository implements iStoreRepository
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
     * @return array
     */
    function listStores()
    {
        // TODO: Implement listStores() method.
    }

    /**
     * @param string $name
     * @return iStoreEntity|null
     */
    function findOneByName($name)
    {
        // TODO: Implement findOneByName() method.
    }

    /**
     * @param iEntity $entity
     * @return iEntity|false
     */
    function insert(iEntity $entity)
    {
        $storageAwareObject = $this->convertObject($entity, new Store());

        $result = $this->gateway->insertOne($storageAwareObject);

        if($result->getInsertedCount() == 1){
            return $result->getInsertedId();
        }
        else{
            return false;
        }

    }
}
