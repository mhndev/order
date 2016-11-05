<?php

namespace mhndev\order\repositories\mongo;

use mhndev\order\interfaces\entities\iEntity;
use mhndev\order\interfaces\entities\iStoreEntity;
use mhndev\order\interfaces\repositories\iStoreRepository;
use MongoDB\Database;

/**
 * Class StoreRepository
 * @package mhndev\order\repositories\mongo
 */
class StoreRepository implements iStoreRepository
{


    /**
     * @var Database
     */
    protected $db;

    /**
     * @var string
     */
    protected $collectionName;

    /**
     * @var \MongoDB\Collection
     */
    protected $gateway;


    /**
     * AddressBookMongo constructor.
     * @param Database $db
     * @param $collectionName
     * @internal param $gateway
     */
    function __construct(Database $db, $collectionName)
    {
        $this->db = $db;
        $this->collectionName = $collectionName;
        $this->gateway = $this->db->{$this->collectionName};
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
     * @return iEntity
     */
    function store(iEntity $entity)
    {
        $result = $this->gateway->insertOne($entity);

        return $result;
    }
}
