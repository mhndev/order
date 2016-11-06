<?php

namespace mhndev\order\entities\mongo;

use \mhndev\order\entities\common\Shipping as BaseShipping;
use mhndev\order\interfaces\entities\iShippingEntity;
use mhndev\order\traits\MongoPersistableTrait;
use MongoDB\BSON\Persistable;

/**
 * Class Shipping
 * @package mhndev\order\entities\mongo
 */
class Shipping extends BaseShipping implements iShippingEntity,Persistable
{
    use MongoPersistableTrait;

}
