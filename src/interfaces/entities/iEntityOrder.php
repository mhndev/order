<?php

namespace mhndev\order\interfaces\entities;

/**
 * Interface iOrderEntity
 * @package mhndev\order\interfaces
 */
interface iEntityOrder extends iEntity
{
    /**
     * @return mixed
     */
    function getIdentifier();

    /**
     * @return mixed
     */
    function getStatus();


    /**
     * @return mixed
     */
    function getPrice();


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
    function getItems();

    /**
     * @param iEntityOrderItemObject $item
     * @return $this
     */
    function addItem(iEntityOrderItemObject $item);

    /**
     * @return mixed
     */
    function clearItems();

}
