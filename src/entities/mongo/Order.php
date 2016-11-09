<?php

namespace mhndev\order\entities\mongo;

use \mhndev\order\entities\common\Order as BaseOrder;
use mhndev\order\interfaces\entities\iEntityOrder;
use mhndev\order\traits\MongoPersistableTrait;
use MongoDB\BSON\Persistable;
/**
 * Class Order
 * @package mhndev\order\entities\mongo
 */
class Order extends BaseOrder implements iEntityOrder,Persistable
{

    use MongoPersistableTrait;

    /**
     * @return mixed
     */
    function getItems()
    {
        // TODO: Implement getItems() method.
    }

    /**
     * @return mixed
     */
    function clearItems()
    {
        // TODO: Implement clearItems() method.
    }
}
