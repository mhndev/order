<?php

namespace mhndev\order;

use mhndev\order\interfaces\entities\iEntityOrder;

/**
 * Class OrderAccess
 * @package mhndev\driver\services
 */
class OrderAccess
{
    /**
     * @var array $exceptions
     */
    private $exceptions;


    /**
     * @param array $exceptions
     */
    function __construct(array $exceptions)
    {
        $this->exceptions = $exceptions;
    }

    /**
     * @param iEntityOrder $order
     * @param string $status
     * @param $scopes
     * @return mixed
     */
    function can(iEntityOrder $order, $status, $scopes)
    {
        if(! is_array($scopes)){
            $scopes = [$scopes, '*'];
        }else{
            $scopes[] = '*';
        }


        foreach ($scopes as $scope) {
            if(! array_key_exists($scope, $this->exceptions)){
                return 'no-access';
            }

            if(array_key_exists($order->getStatus().':::'.$status, $this->exceptions[$scope] ) ){
                return $this->exceptions[$scope][$order->getStatus().':::'.$status];
            }
        }

        return true;
    }

}
