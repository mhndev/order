<?php

namespace mhndev\order\interfaces\entities;

/**
 * Interface iShippingEntity
 * @package mhndev\order\interfaces
 */
interface iShippingEntity extends iEntity
{
    /**
     * @return mixed
     */
    function getShipper();

    /**
     * @return mixed
     */
    function getStart();

    /**
     * @return mixed
     */
    function getEnd();

    /**
     * @return mixed
     */
    function getOrderEntity();

    /**
     * @return mixed
     */
    function isSingleOrder();

    /**
     * @return mixed
     */
    function getOrderEntities();

}
