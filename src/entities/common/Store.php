<?php

namespace mhndev\order\entities\common;

use mhndev\order\interfaces\entities\iStoreEntity;
use mhndev\order\traits\EntityBuilderTrait;

/**
 * Class Store
 * @package mhndev\order\entities
 */
class Store implements iStoreEntity
{

    use EntityBuilderTrait;

    /**
     * @var string
     */
    protected $name;


    /**
     * @return mixed
     */
    function getName()
    {
        return $this->name;
    }

    /**
     * @param $name string
     * @return $this
     */
    function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}
