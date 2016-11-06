<?php

namespace mhndev\order\repositories\mongo;

use mhndev\order\entities\mongo\Product;
use mhndev\order\interfaces\entities\iEntity;
use mhndev\order\interfaces\repositories\iProductRepository;

/**
 * Class ProductRepository
 * @package mhndev\order\repositories\mongo
 */
class ProductRepository extends aRepository implements iProductRepository
{

    /**
     * @return array
     */
    function listProducts()
    {
        // TODO: Implement listProducts() method.
    }

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
     * @param iEntity $entity
     * @return iEntity|false
     */
    function insert(iEntity $entity)
    {
        $storageAwareObject = $this->convertObject($entity, new Product());

        $result = $this->gateway->insertOne($storageAwareObject);

        if($result->getInsertedCount() == 1){
            return $result->getInsertedId();
        }
        else{
            return false;
        }

    }
}
