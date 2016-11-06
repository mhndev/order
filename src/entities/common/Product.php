<?php
namespace mhndev\order\entities\common;

use mhndev\order\interfaces\entities\iProductEntity;
use mhndev\order\traits\EntityBuilderTrait;

/**
 * Class Product
 * @package mhndev\order\entities
 */
class Product implements iProductEntity
{

    use EntityBuilderTrait;

    /**
     * @var
     */
    protected $name;

    /**
     * @var
     */
    protected $identifier;

    /**
     * @var
     */
    protected $price;


    /**
     * @return mixed
     */
    function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     * @return $this
     */
    function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * @param $identifier
     * @return $this
     */
    function setIdentifier($identifier)
    {
        $this->identifier = $identifier;

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
     * @param $price
     * @return mixed
     */
    function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }
}
