<?php

namespace mhndev\order\interfaces\repositories;

/**
 * Interface iProductRepository
 * @package mhndev\order\interfaces
 */
interface iProductRepository extends iRepository
{
    /**
     * @return array
     */
    function listProducts();

}
