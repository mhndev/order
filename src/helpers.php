<?php

/**
 * Unset Value From an array
 */
if(! function_exists('unsetValue'))
{
    function unsetValue(array $array, $value, $strict = TRUE)
    {
        if(($key = array_search($value, $array, $strict)) !== FALSE) {
            unset($array[$key]);
        }
        return $array;
    }
}
