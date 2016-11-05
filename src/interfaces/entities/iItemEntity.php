<?php

namespace mhndev\order\interfaces\entities;

/**
 * Interface iItemEntity
 * @package mhndev\order\interfaces
 */
interface iItemEntity extends iEntity
{

    /**
     * @return mixed
     */
    function getProductEntity();

    /**
     * @return mixed
     */
    function getPrice();

    /**
     * @return mixed
     */
    function getOrderEntity();

    /**
     * @return mixed
     */
    function getStore();

}
