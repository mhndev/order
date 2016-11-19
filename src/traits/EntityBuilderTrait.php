<?php

namespace mhndev\order\traits;
use mhndev\order\entities\common\OrderItem;
use MongoDB\Model\BSONArray;

/**
 * Class EntityBuilderTrait
 * @package mhndev\order\traits
 */
trait EntityBuilderTrait
{


    /**
     * @param $name
     * @param $value
     */
    function __set($name, $value)
    {
        $this->$name = $value;
    }

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


    /**
     * @param $array
     * @return array
     */
    private function cleanArray($array)
    {
        $result = [];

        foreach ($array as $key => $value){
            $newKey = $key;

            if(strpos($key, '*') > 0){
                $newKey = substr($key, 3, strlen($key));

            }

            if(is_array($value)){
                $result[$newKey] = $this->cleanArray($value);
            }else{
                $result[$newKey] = $value;
            }

        }


        return $result;
    }


    /**
     * @param $obj
     * @return array
     */
    private function object_to_array($obj)
    {
        if(is_object($obj)) {
            $obj = (array) $obj;
        }

        if(is_array($obj)) {
            $new = array();
            foreach($obj as $key => $val) {
                $new[$key] = $this->object_to_array($val);
            }
        }

        else $new = $obj;

        return $new;
    }


    /**
     * @param $object
     * @return array
     */
    function objectToArray($object)
    {
        return $this->cleanArray($this->object_to_array($object));
    }
}
