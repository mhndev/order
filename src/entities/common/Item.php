<?php

namespace mhndev\order\entities\common;

use mhndev\order\interfaces\entities\iItemEntity;
use mhndev\order\interfaces\entities\iOrderEntity;
use mhndev\order\interfaces\entities\iProductEntity;
use mhndev\order\interfaces\entities\iStoreEntity;
use mhndev\order\traits\EntityBuilder;

/**
 * Class Item
 * @package mhndev\order\entities\common
 */
class Item implements iItemEntity
{

    use EntityBuilder;

    /**
     * @var iProductEntity
     */
    protected $product;

    /**
     * @var integer
     */
    protected $price;

    /**
     * @var iOrderEntity
     */
    protected $order;

    /**
     * @var iStoreEntity
     */
    protected $store;



    /**
     * @return iProductEntity
     */
    function getProductEntity()
    {
        return $this->product;
    }

    /**
     * @return integer
     */
    function getPrice()
    {
        return $this->price;
    }

    /**
     * @return iOrderEntity
     */
    function getOrderEntity()
    {
        return $this->order;
    }

    /**
     * @return iStoreEntity
     */
    function getStore()
    {
        return $this->store;
    }
}
