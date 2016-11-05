<?php

namespace mhndev\order\interfaces\entities;

/**
 * Interface iOrderEntity
 * @package mhndev\order\interfaces
 */
interface iProductEntity extends iEntity
{

    /**
     * @return mixed
     */
    function getName();

    /**
     * @return mixed
     */
    function getIdentifier();

    /**
     * @return mixed
     */
    function getPrice();


}
