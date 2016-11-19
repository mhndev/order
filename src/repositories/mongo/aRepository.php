<?php

namespace mhndev\order\repositories\mongo;

use MongoDB\Database;

/**
 * Class aRepository
 * @package mhndev\order\repositories\mongo
 */
abstract class aRepository
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
     * @var string
     */
    protected $entityClass;

    /**
     * AddressBookMongo constructor.
     * @param Database $db
     * @param $collectionName string
     * @internal param $gateway
     */
    function __construct(Database $db, $collectionName)
    {
        $this->db = $db;
        $this->collectionName = $collectionName;
        $this->gateway = $this->db->{$this->collectionName};
    }

}
