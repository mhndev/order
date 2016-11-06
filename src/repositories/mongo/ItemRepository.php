<?php

namespace mhndev\order\repositories\mongo;

use mhndev\order\interfaces\entities\iEntity;
use mhndev\order\interfaces\repositories\iItemRepository;

/**
 * Class ItemRepository
 * @package mhndev\order\repositories\mongo
 */
class ItemRepository extends aRepository implements iItemRepository
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
     * @param iEntity $entity
     * @return iEntity
     */
    function insert(iEntity $entity)
    {
        // TODO: Implement insert() method.
    }
}
