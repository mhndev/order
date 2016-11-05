<?php

namespace mhndev\order\entities\common;

use mhndev\order\interfaces\entities\iItemEntity;
use mhndev\order\interfaces\entities\iOrderEntity;
use mhndev\order\interfaces\entities\iStoreEntity;
use mhndev\order\traits\EntityBuilder;

/**
 * Class Order
 * @package mhndev\order\entities
 */
class Order implements iOrderEntity
{

    use EntityBuilder;

    /**
     * @var
     */
    protected $identifier;

    /**
     * @var
     */
    protected $status;

    /**
     * @var integer
     */
    protected $price;

    /**
     * @var
     */
    protected $date;

    /**
     * @var
     */
    protected $ownerIdentifier;


    /**
     * @var iStoreEntity
     */
    protected $store;


    /**
     * @var array of iItemEntity
     */
    protected $items;


    const ORDER_CANCELED = 1;
    const ORDER_RECEIVED = 2;
    const ORDER_PAYED    = 3;






    /**
     * @return mixed
     */
    function getStatus()
    {
        return $this->status;
    }

    /**
     * @return mixed
     */
    function getTotalPrice()
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    function getDate()
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    function getOwnerIdentifier()
    {
        return $this->ownerIdentifier;
    }

    /**
     * @return mixed
     */
    function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * @return iStoreEntity
     */
    function getStore()
    {
        return $this->store;
    }

    /**
     * @return array
     */
    function getItemEntities()
    {
        return $this->items;
    }

    /**
     * @param iItemEntity $item
     * @return $this
     * @throws \Exception
     */
    function addItem(iItemEntity $item)
    {
        if (in_array($item, $this->items, true)) {
            throw new \Exception('item already exist in items array');
        }

        $this->items[] = $item;

        return $this;
    }

    /**
     * @param iItemEntity $item
     * @return $this
     * @throws \Exception
     */
    function removeItem(iItemEntity $item)
    {
        if (!in_array($item, $this->items, true)) {
            throw new \Exception("item doesn't exist in items array");
        }

        unsetValue($this->items, $item);

        return $this;
    }

}
