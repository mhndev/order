<?php

namespace mhndev\order\entities\common;
use mhndev\order\interfaces\entities\iOrderEntity;
use mhndev\order\interfaces\entities\iShippingEntity;
use mhndev\order\traits\EntityBuilderTrait;

/**
 * Class Shipping
 * @package mhndev
 */
class Shipping implements iShippingEntity
{

    use EntityBuilderTrait;

    /**
     * @var mixed
     */
    protected $shipper;

    /**
     * @var mixed
     */
    protected $start;

    /**
     * @var mixed
     */
    protected $end;

    /**
     * @var iOrderEntity
     */
    protected $order;


    /**
     * @var boolean
     */
    protected $isSingleOrder;


    /**
     * @return mixed
     */
    function getShipper()
    {
        return $this->shipper;
    }

    /**
     * @return mixed
     */
    function getStart()
    {
        return $this->start;
    }

    /**
     * @return mixed
     */
    function getEnd()
    {
        return $this->end;
    }

    /**
     * @return iOrderEntity
     */
    function getOrderEntity()
    {
        return $this->order;
    }

    /**
     * @return boolean
     */
    function isSingleOrder()
    {
        return $this->isSingleOrder;
    }

    /**
     * @return mixed
     */
    function getOrderEntities()
    {
        return $this->order;
    }
}
