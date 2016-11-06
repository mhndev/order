<?php

namespace mhndev\order\entities\common;

use mhndev\order\interfaces\entities\iItemEntity;
use mhndev\order\interfaces\entities\iOrderEntity;
use mhndev\order\interfaces\entities\iShippingEntity;
use mhndev\order\interfaces\entities\iStoreEntity;
use mhndev\order\traits\EntityBuilderTrait;

/**
 * Class Order
 * @package mhndev\order\entities
 */
class Order implements iOrderEntity
{

    use EntityBuilderTrait {
        fromOptions as fromOptionsParent;
    }

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
     * @var iShippingEntity
     */
    protected $shipping;

    /**
     * @var array of iItemEntity
     */
    protected $items = [];


    const ORDER_INIT     = 1;
    const ORDER_CANCELED = 2;
    const ORDER_RECEIVED = 3;
    const ORDER_PAYED    = 4;


    /**
     * @param array $options
     * @return $this|void
     */
    static function fromOptions(array $options)
    {
        $instance = self::fromOptionsParent($options);

        $instance->setStatus(self::ORDER_INIT);
        $instance->setDate(time());

        return $instance;
    }

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
     * @param iShippingEntity $shipping
     * @return $this
     */
    function setShipping(iShippingEntity $shipping)
    {
        $this->shipping = $shipping;

        return $this;
    }

    /**
     * @return iShippingEntity
     */
    function getShipping()
    {
        return $this->shipping;
    }
}
