<?php

namespace mhndev\order\entities\common;

use mhndev\order\interfaces\entities\iEntityOrderItemObject;
use mhndev\phpStd\ObjectBuilder;
use Traversable;

/**
 * Class OrderItem
 * @package mhndev\order\entities\common
 */
class OrderItem implements iEntityOrderItemObject
{

    use ObjectBuilder;

    /**
     * @var float
     */
    protected $price;

    /**
     * @var
     */
    protected $itemType;


    /**
     * @var array|\Traversable
     */
    protected $extra;

    /**
     * @var
     */
    protected $itemIdentifier;


    /**
     * @param array $options
     * @return static
     */
    static function fromOptions(array $options)
    {
        $instance = new static();

        foreach ($options as $key => $value){
            $instance->{'set'.ucfirst($key)}($value);
        }

        return $instance;
    }


    /**
     * @return float
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
        $this->price = (float) $price;

        return $this;
    }


    /**
     * @return mixed
     */
    function getItemIdentifier()
    {
        return $this->itemIdentifier;
    }

    /**
     * @return mixed
     */
    function getItemType()
    {
        return $this->itemType;
    }

    /**
     * @return array|\Traversable
     */
    function getExtra()
    {
        return $this->extra;
    }

    /**
     * @param $extra
     * @return $this
     */
    function setExtra($extra)
    {
        $this->extra = $extra;

        return $this;
    }

    /**
     * @param mixed $itemType
     * @return $this
     */
    public function setItemType($itemType)
    {
        $this->itemType = $itemType;

        return $this;
    }

    /**
     * @param $identifier
     * @return $this
     */
    public function setItemIdentifier($identifier)
    {
        $this->itemIdentifier = $identifier;

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

}
