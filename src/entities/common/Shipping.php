<?php
namespace mhndev\order\entities\common;

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
     * @var array iOrderEntity
     */
    protected $orders;


    /**
     * @var boolean
     */
    private $isSingleOrder;


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
     * @return boolean
     */
    function isSingleOrder()
    {
        return $this->isSingleOrder;
    }

    /**
     * @return array of order entities
     */
    function getOrderEntities()
    {
        return $this->orders;
    }
}
