<?php

namespace mhndev\order\traits;
use mhndev\order\interfaces\entities\iEntity;

/**
 * Class EntityBuilderTrait
 * @package mhndev\order\traits
 */
trait EntityBuilderTrait
{

    /**
     * @param array $options
     * @return static
     */
    static function fromOptions(array $options)
    {
        $instance = new self();

        foreach ($options as $key => $value){
            $instance->{'set'.ucfirst($key)}($value);
        }

        return $instance;
    }

    function buildByOptions(array $options)
    {
        foreach ($options as $key => $value){
            $this->{'set'.ucfirst($key)}($value);
        }

        return $this;
    }

    /**
     * @param iEntity $entity
     * @return array
     */
    static function toArray(iEntity $entity)
    {
        \Kint::dump((array) $entity);
        die();


        return (array) $entity;
    }
}
