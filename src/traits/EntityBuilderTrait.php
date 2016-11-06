<?php

namespace mhndev\order\traits;

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
        $instance = new static();

        foreach ($options as $key => $value){
            $instance->{'set'.ucfirst($key)}($value);
        }

        return $instance;
    }

    /**
     * @param array $options
     * @return $this
     */
    function buildByOptions(array $options)
    {
        foreach ($options as $key => $value){
            $this->{'set'.ucfirst($key)}($value);
        }

        return $this;
    }

    /**
     * @return array
     */
    function toArray()
    {
        return get_object_vars($this);
    }
}
