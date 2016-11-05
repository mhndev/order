<?php

namespace mhndev\order\interfaces\repositories;
use mhndev\order\interfaces\entities\iStoreEntity;

/**
 * Interface iStoreRepository
 * @package mhndev\order\interfaces
 */
interface iStoreRepository extends iRepository
{

    /**
     * @return array
     */
    function listStores();


    /**
     * @param string $name
     * @return iStoreEntity|null
     */
    function findOneByName($name);
}
