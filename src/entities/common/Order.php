<?php

namespace mhndev\order\entities\common;

use mhndev\order\interfaces\entities\iEntityOrderItemObject;
use mhndev\order\interfaces\entities\iEntityOrder;
use mhndev\order\traits\EntityBuilderTrait;

/**
 * Class Order
 * @package mhndev\order\entities
 */
class Order implements iEntityOrder
{

    use EntityBuilderTrait;

    /**
     * @var
     */
    protected $identifier;

    /**
     * @var
     */
    protected $status;

    /**
     * @var float
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
     * Order constructor.
     * @param null $data
     */
    function __construct($data = null)
    {
//        $this->ownerIdentifier = $data['owner'];
//
//        $this->setItems($data['items']);
//        $this->date = time();
//        $this->status = self::ORDER_INIT;
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
        $this->price += $item->getPrice();

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

        $this->price -= $item->getPrice();

        unsetValue($this->items, $item);

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
     * @param array $items
     * @return $this
     */
    function setItems(array $items)
    {

        foreach ($items as $item){
            $orderItemObject = new OrderItem($item);

            //todo check this code here ...
            $orderItemObject->setPrice($item['price']);
            $orderItemObject->setExtra($item['extra'] );
            $orderItemObject->setItemType($item['itemType']);
            $orderItemObject->setItemIdentifier($item['itemIdentifier']);


            $this->addItem($orderItemObject);
        }
        return $this;
    }


    /**
     * @return mixed
     */
    function getItems()
    {
        return $this->items;
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
     * @return $this
     */
    function clearItems()
    {
        $this->items = [];

        return $this;
    }

}
