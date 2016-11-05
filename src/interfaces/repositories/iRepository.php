<?php

namespace mhndev\order\interfaces\repositories;
use mhndev\order\interfaces\entities\iEntity;

/**
 * Interface iRepository
 * @package mhndev\order\interfaces
 */
interface iRepository
{

    /**
     * @param $identifier
     * @return mixed
     */
    function findByIdentifier($identifier);


    /**
     * @param $identifier
     * @return mixed
     */
    function deleteByIdentifier($identifier);


    /**
     * @param iEntity $entity
     * @return iEntity
     */
    function store(iEntity $entity);

}
