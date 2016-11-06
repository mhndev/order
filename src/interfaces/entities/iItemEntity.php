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
     * @return integer
     */
    function getPrice();

    /**
     * @return iOrderEntity
     */
    function getOrder();

    /**
     * @return iStoreEntity
     */
    function getStore();

}
