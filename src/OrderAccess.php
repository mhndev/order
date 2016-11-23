<?php

namespace mhndev\driver\services;

use mhndev\order\interfaces\entities\iEntityOrder;

/**
 * Class OrderAccess
 * @package mhndev\driver\services
 */
class OrderAccess
{
    /**
     *
     * Rule Sample
     * [
     *      fromStatus
     *      toStatus
     *      callable
     *
     * ]
     * @var array $rules
     */
    private static $rules;


    /**
     * @param $fromStatus
     * @param $toStatus
     * @param callable $callable which should return true or false
     *
     * @param array $options
     * @throws \Exception
     */
    static function allow($fromStatus, $toStatus, Callable $callable, array $options = [])
    {
        if(array_key_exists($fromStatus, self::$rules)){
            throw new \Exception('Rule Already Exist');
        }

        self::$rules[$fromStatus] = [
            'fromStatus' => $fromStatus,
            'toStatus' => $toStatus,
            'callable' => $callable,
            'options'  => $options
        ];

    }


    /**
     * @param iEntityOrder $order
     * @param $status
     * @return mixed
     */
    static function can(iEntityOrder $order, $status)
    {
        $rule = self::$rules[$order->getStatus()];

        $callable = $rule['callable']();

        unset($rule['callable']);

        return $callable($rule, $status);
    }

}
