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
     * @param integer $status
     * @return $this
     */
    function setStatus($status);


    /**
     * @return mixed
     */
    function getPrice();


    /**
     * @param $price
     * @return $this
     */
    function setPrice($price);


    /**
     * @return mixed
     */
    function getDate();


    /**
     * @param $date
     * @return $this
     */
    function setDate($date);

    /**
     * @return mixed
     */
    function getOwnerIdentifier();


    /**
     * @param $ownerIdentifier
     * @return $this
     */
    function setOwnerIdentifier($ownerIdentifier);


    /**
     * @return mixed
     */
    function getIdentifier();


    /**
     * @param $identifier string
     * @return $this
     */
    function setIdentifier($identifier);

    /**
     * @return iStoreEntity
     */
    function getStore();


    /**
     * @param iStoreEntity $store
     * @return mixed
     */
    function setStore(iStoreEntity $store);

    /**
     * @return mixed
     */
    function getItemEntities();

    /**
     * @param iItemEntity $item
     * @return $this
     */
    function addItem(iItemEntity $item);


    /**
     * @param iItemEntity $item
     * @return $this
     */
    function removeItem(iItemEntity $item);
}
