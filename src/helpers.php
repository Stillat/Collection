<?php

use Collection\Collection;
use Collection\Contracts\Htmlable;


if (!function_exists('instance_of_laravel_arrayable')) {
    /**
     * Determines if a class instance also implements Laravel's Arrayable contract.
     *
     * @param $value
     *
     * @return bool
     */
    function instance_of_laravel_arrayable($value)
    {
        if (is_object($value)) {
            if (isset(class_implements($value)['Illuminate\Contracts\Support\Arrayable'])) {
                return true;
            }
        }
        return false;
    }
}


if (!function_exists('instance_of_laravel_jsonable')) {
    /**
     * Determines if a class instance also implements Laravel's Jsonable contract.
     *
     * @param $value
     *
     * @return bool
     */
    function instance_of_laravel_jsonable($value)
    {
        if (is_object($value)) {
            if (isset(class_implements($value)['Illuminate\Contracts\Support\Jsonable'])) {
                return true;
            }
        }
        return false;
    }
}

if (!function_exists('collect')) {

    /**
     * Create a collection from the given value.
     *
     * @param  mixed $value
     *
     * @return \Collection\Collection
     */

    function collect($value = null)
    {

        return new Collection($value);

    }

}

if (!function_exists('data_get')) {

    /**
     * Get an item from an array or object using "dot" notation.
     *
     * @param  mixed        $target
     * @param  string|array $key
     * @param  mixed        $default
     *
     * @return mixed
     */

    function data_get($target, $key, $default = null)
    {

        if (is_null($key)) {

            return $target;

        }


        $key = is_array($key) ? $key : explode('.', $key);


        foreach ($key as $segment) {

            if (is_array($target)) {

                if (!array_key_exists($segment, $target)) {

                    return value($default);

                }


                $target = $target[$segment];

            } elseif ($target instanceof ArrayAccess) {

                if (!isset($target[$segment])) {

                    return value($default);

                }


                $target = $target[$segment];

            } elseif (is_object($target)) {

                if (!isset($target->{$segment})) {

                    return value($default);

                }


                $target = $target->{$segment};

            } else {

                return value($default);

            }

        }


        return $target;

    }

}

if (!function_exists('e')) {

    /**
     * Escape HTML entities in a string.
     *
     * @param  \Collection\Contracts\Htmlable|string $value
     *
     * @return string
     */

    function e($value)
    {

        if ($value instanceof Htmlable) {

            return $value->toHtml();

        }


        return htmlentities($value, ENT_QUOTES, 'UTF-8', false);

    }

}

if (!function_exists('last')) {

    /**
     * Get the last element from an array.
     *
     * @param  array $array
     *
     * @return mixed
     */

    function last($array)
    {

        return end($array);

    }

}

if (!function_exists('value')) {

    /**
     * Return the default value of the given value.
     *
     * @param  mixed $value
     *
     * @return mixed
     */

    function value($value)
    {

        return $value instanceof Closure ? $value() : $value;

    }

}

if (!function_exists('with')) {

    /**
     * Return the given object. Useful for chaining.
     *
     * @param  mixed $object
     *
     * @return mixed
     */

    function with($object)
    {

        return $object;

    }

}
