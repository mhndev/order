<?php

namespace mhndev\order\interfaces\entities;

/**
 * Interface iEntityOrderItemObject
 * @package mhndev\order\interfaces
 */
interface iEntityOrderItemObject extends iEntity
{

    /**
     * @return mixed
     */
    function getItemIdentifier();

    /**
     * @return mixed
     */
    function getItemType();

    /**
     * @return float
     */
    function getPrice();

    /**
     * @return array|\Traversable
     */
    function getExtra();

}
