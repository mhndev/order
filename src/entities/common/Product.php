<?php
namespace mhndev\order\entities\common;

use mhndev\order\interfaces\entities\iProductEntity;
use mhndev\order\traits\EntityBuilder;

/**
 * Class Product
 * @package mhndev\order\entities
 */
class Product implements iProductEntity
{

    use EntityBuilder;

    protected $name;

    protected $identifier;

    protected $price;


    /**
     * @return mixed
     */
    function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * @return mixed
     */
    function getPrice()
    {
        return $this->price;
    }
}
