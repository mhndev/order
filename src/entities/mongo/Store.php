<?php

namespace mhndev\order\entities\mongo;

use \mhndev\order\entities\common\Store as BaseStore;
use mhndev\order\interfaces\entities\iStoreEntity;
use mhndev\order\traits\MongoPersistableTrait;
use MongoDB\BSON\Persistable;

/**
 * Class Store
 * @package mhndev\order\entities\mongo
 */
class Store extends BaseStore implements iStoreEntity,Persistable
{

    use MongoPersistableTrait;

}
