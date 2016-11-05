<?php

namespace mhndev\order\interfaces\entities;

/**
 * Interface iOrderEntity
 * @package mhndev\order\interfaces
 */
interface iOrderEntity extends iEntity
{

    /**
     * @return mixed
     */
    function getStatus();

    /**
     * @return mixed
     */
    function getTotalPrice();

    /**
     * @return mixed
     */
    function getDate();

    /**
     * @return mixed
     */
    function getOwnerIdentifier();

    /**
     * @return mixed
     */
    function getIdentifier();

    /**
     * @return iStoreEntity
     */
    function getStore();

    /**
     * @return mixed
     */
    function getItemEntities();

    /**
     * @param iItemEntity $item
     * @return mixed
     */
    function addItem(iItemEntity $item);


    /**
     * @param iItemEntity $item
     * @return mixed
     */
    function removeItem(iItemEntity $item);
}
