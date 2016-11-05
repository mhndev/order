<?php
namespace mhndev\order\interfaces\entities;

/**
 * Interface iEntity
 * @package mhndev\order\interfaces
 */
interface iEntity
{
    /**
     * @param array $options
     * @return $this
     */
    static function fromOptions(array $options);
}
