<?php

namespace mhndev\order\repositories\mongo;

use mhndev\order\interfaces\repositories\iProductRepository;

/**
 * Class ProductRepository
 * @package mhndev\order\repositories\mongo
 */
class ProductRepository implements iProductRepository
{

    /**
     * @return array
     */
    function listProducts()
    {
        // TODO: Implement listProducts() method.
    }

    /**
     * @param $identifier
     * @return mixed
     */
    function findByIdentifier($identifier)
    {
        // TODO: Implement findByIdentifier() method.
    }

    /**
     * @param $identifier
     * @return mixed
     */
    function deleteByIdentifier($identifier)
    {
        // TODO: Implement deleteByIdentifier() method.
    }
}
