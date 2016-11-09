<?php

namespace mhndev\order\entities\mongo;

use mhndev\order\interfaces\entities\iEntityOrderItemObject;
use \mhndev\order\entities\common\OrderItem as BaseItem;
use mhndev\order\traits\MongoPersistableTrait;
use MongoDB\BSON\Persistable;

/**
 * Class Item
 * @package mhndev\order\entities\mongo
 */
class OrderItem extends BaseItem implements iEntityOrderItemObject,Persistable
{
    use MongoPersistableTrait;

}
