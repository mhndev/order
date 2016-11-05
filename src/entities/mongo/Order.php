<?php

namespace mhndev\order\entities\mongo;

use \mhndev\order\entities\common\Order as BaseOrder;
use mhndev\order\interfaces\entities\iOrderEntity;
use mhndev\order\traits\MongoPersistableTrait;
use MongoDB\BSON\Persistable;

class Order extends BaseOrder implements iOrderEntity,Persistable
{

    use MongoPersistableTrait;

}
