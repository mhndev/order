<?php

namespace mhndev\order\entities\mongo;

use mhndev\order\interfaces\entities\iItemEntity;
use \mhndev\order\entities\common\Item as BaseItem;
use mhndev\order\traits\MongoPersistableTrait;
use MongoDB\BSON\Persistable;

/**
 * Class Item
 * @package mhndev\order\entities\mongo
 */
class Item extends BaseItem implements iItemEntity,Persistable
{
    use MongoPersistableTrait;

}
