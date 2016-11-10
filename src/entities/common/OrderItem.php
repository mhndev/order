<?php

namespace mhndev\order\entities\common;

use mhndev\order\interfaces\entities\iEntityOrderItemObject;

/**
 * Class OrderItem
 * @package mhndev\order\entities\common
 */
class OrderItem implements iEntityOrderItemObject
{

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
}
