<?php

namespace mhndev\order\interfaces\entities;

/**
 * Interface iItemEntity
 * @package mhndev\order\interfaces
 */
interface iItemEntity extends iEntity
{

    /**
     * @return iProductEntity
     */
    function getProduct();

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
