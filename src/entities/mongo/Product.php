<?php

namespace mhndev\order\entities\mongo;

use \mhndev\order\entities\common\Product as BaseProduct;
use mhndev\order\interfaces\entities\iProductEntity;
use mhndev\order\traits\MongoPersistableTrait;
use MongoDB\BSON\Persistable;

/**
 * Class Product
 * @package mhndev\order\entities\mongo
 */
class Product extends BaseProduct implements iProductEntity,Persistable
{
    use MongoPersistableTrait;

}
