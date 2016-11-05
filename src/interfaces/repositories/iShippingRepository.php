<?php

namespace mhndev\order\interfaces\repositories;

/**
 * Interface iShippingRepository
 * @package mhndev\order\interfaces
 */
interface iShippingRepository extends iRepository
{
    /**
     * @param $shipper
     * @return array|null
     */
    function findShippingsByShipper($shipper);

    /**
     * @param $start
     * @param $end
     * @return mixed
     */
    function findShippingByTimeInterval($start, $end);

    /**
     * @return array|null
     */
    function listShippings();
}
