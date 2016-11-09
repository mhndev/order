<?php

namespace mhndev\order\entities\common;

use mhndev\order\interfaces\entities\iEntityOrderItemObject;
use mhndev\order\interfaces\entities\iEntityOrder;
use mhndev\order\interfaces\entities\iProductEntity;
use mhndev\order\interfaces\entities\iStoreEntity;
use mhndev\order\traits\EntityBuilderTrait;

/**
 * Class Item
 * @package mhndev\order\entities\common
 */
class OrderItem implements iEntityOrderItemObject
{

    use EntityBuilderTrait;

    /**
     * @var iProductEntity
     */
    protected $product;

    /**
     * @var integer
     */
    protected $price;

    /**
     * @var iEntityOrder
     */
    protected $order;

    /**
     * @var iStoreEntity
     */
    protected $store;



    /**
     * @return iProductEntity
     */
    function getProduct()
    {
        return $this->product;
    }

    /**
     * @param iProductEntity $product
     */
    function setProduct(iProductEntity $product)
    {
        $this->product = $product;
    }

    /**
     * @return integer
     */
    function getPrice()
    {
        return $this->price;
    }

    /**
     * @param $price
     * @return $this
     */
    function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return iEntityOrder
     */
    function getOrderEntity()
    {
        return $this->order;
    }


    /**
     * @param iEntityOrder $order
     * @return $this
     */
    function setOrder(iEntityOrder $order)
    {
        $this->order = $order;

        return $this;
    }


    /**
     * @param iStoreEntity $store
     * @return $this
     */
    function setStore(iStoreEntity $store)
    {
        $this->store = $store;

        return $this;
    }

    /**
     * @return iStoreEntity
     */
    function getStore()
    {
        return $this->store;
    }

    /**
     * @return iEntityOrder
     */
    function getOrder()
    {
        return $this->order;
    }

}
