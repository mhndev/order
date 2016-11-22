<?php

namespace mhndev\order\entities\common;

use mhndev\order\interfaces\entities\iEntityOrderItemObject;
use mhndev\order\interfaces\entities\iEntityOrder;
use mhndev\order\exceptions\InvalidArgumentException;
use mhndev\phpStd\ObjectBuilder;
use Traversable;

/**
 * Class Order
 * @package mhndev\order\entities
 */
class Order implements iEntityOrder
{

    use ObjectBuilder;

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
    protected $price = 0;

    /**
     * @var
     */
    protected $date;

    /**
     * @var
     */
    protected $ownerIdentifier;


    /**
     * @var array
     */
    protected $options;


    /**
     * @var array of iItemEntity
     */
    protected $items = [];


    const ORDER_INIT     = 1;

    const ORDER_CANCELED_BY_CUSTOMER = 2;

    const ORDER_CANCELED_BY_DRIVER = 3;

    const ORDER_CANCELED_BY_ROOT = 4;

    const ORDER_CONFIRMED_BY_DRIVER = 5;

    const ORDER_DELIVERED = 6;


    /**
     * Order constructor.
     * @param null $date
     */
    function __construct($date = null)
    {
        $this->date = time();
        $this->status = self::ORDER_INIT;
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
     * @param $items
     * @return $this
     */
    function setItems($items)
    {
        if(! is_array($items) && ! ($items instanceof Traversable) && ! ($items instanceof \stdClass)){
            throw new InvalidArgumentException('argument must be array or instance of StdClass or 
            It should be instance of \Traversable ');
        }

        if($items instanceof \stdClass){
            $items = $this->objectToArray($items);
        }



        foreach ($items as $item){

            if($item instanceof \ArrayObject){
                $item = $item->getArrayCopy();
            }

            if($item instanceof \stdClass){
                $item = $this->objectToArray($item);
            }

            $orderItemObject = new OrderItem($item);

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

    /**
     * Retrieve an external iterator
     * @link http://php.net/manual/en/iteratoraggregate.getiterator.php
     * @return Traversable An instance of an object implementing <b>Iterator</b> or
     * <b>Traversable</b>
     * @since 5.0.0
     */
    public function getIterator()
    {
        $result = $this->objectToArray($this);

        return new \ArrayIterator($result);
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param array $options
     * @return $this
     */
    public function setOptions($options)
    {
        $this->options = $options;

        return $this;
    }

    /**
     * @param string $optionKey
     * @param Traversable | array $optionValue
     * @return $this
     */
    public function addOption($optionKey, $optionValue)
    {
        $this->options[$optionKey] = $optionValue;

        return $this;
    }


    /**
     * @param string $optionKey
     * @return $this
     */
    public function removeOption($optionKey)
    {
        unset($this->options[$optionKey]);

        return $this;
    }

}
