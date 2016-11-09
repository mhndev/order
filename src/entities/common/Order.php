<?php

namespace mhndev\order\entities\common;

use mhndev\order\interfaces\entities\iEntityOrderItemObject;
use mhndev\order\interfaces\entities\iEntityOrder;
use Poirot\Std\Struct\DataOptionsOpen;

/**
 * Class Order
 * @package mhndev\order\entities
 */
class Order extends DataOptionsOpen implements iEntityOrder
{
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
     * @var array of iItemEntity
     */
    protected $items = [];


    const ORDER_INIT     = 1;
    const ORDER_CANCELED = 2;
    const ORDER_RECEIVED = 3;
    const ORDER_PAYED    = 4;


    /**
     * @return mixed
     */
    function getStatus()
    {
        return $this->status;
    }

    /**
     * @param integer $status
     * @return $this
     */
    function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return mixed
     */
    function getPrice()
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
     * @return array
     */
    function getItemEntities()
    {
        return $this->items;
    }

    /**
     * @param iEntityOrderItemObject $item
     * @return $this
     * @throws \Exception
     */
    function addItem(iEntityOrderItemObject $item)
    {
        if (in_array($item, $this->items, true)) {
            throw new \Exception('item already exist in items array');
        }

        $this->items[] = $item;

        return $this;
    }

    /**
     * @param iEntityOrderItemObject $item
     * @return $this
     * @throws \Exception
     */
    function removeItem(iEntityOrderItemObject $item)
    {
        if (!in_array($item, $this->items, true)) {
            throw new \Exception("item doesn't exist in items array");
        }

        unsetValue($this->items, $item);

        return $this;
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
     * @param $date
     * @return $this
     */
    function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @param $ownerIdentifier
     * @return $this
     */
    function setOwnerIdentifier($ownerIdentifier)
    {
        $this->ownerIdentifier = $ownerIdentifier;

        return $this;
    }

    /**
     * @param $identifier string
     * @return $this
     */
    function setIdentifier($identifier)
    {
        $this->identifier = $identifier;

        return $this;
    }



    /**
     * @return mixed
     */
    function getItems()
    {
        // TODO: Implement getItems() method.
    }

    /**
     * @return mixed
     */
    function clearItems()
    {
        // TODO: Implement clearItems() method.
    }
}
