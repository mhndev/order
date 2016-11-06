<?php

namespace mhndev\order\interfaces\entities;

/**
 * Interface iOrderEntity
 * @package mhndev\order\interfaces
 */
interface iProductEntity extends iEntity
{

    /**
     * @return string
     */
    function getName();


    /**
     * @return mixed
     */
    function getIdentifier();


    /**
     * @return integer
     */
    function getPrice();


    /**
     * @return iStoreEntity
     */
    function getStore();


}
