<?php

namespace Mookofe\Tail;

class Registry
{

    private static $storedValues = [];

    public static function set(string $key, $value)
    {
        self::$storedValues[$key] = $value;
    }

    public static function all()
    {
        return self::$storedValues;
    }

    public static function get(string $key, $default = null)
    {
        if (!isset(self::$storedValues[$key]) && !is_null($default)) {
            $default = $default instanceof \Closure ? $default() : $default;
            self::set($key, $default);
        }

        return isset(self::$storedValues[$key]) ? self::$storedValues[$key] : null;
    }
    
    public static function remove(string $key)
    {
        unset(self::$storedValues[$key]);
    }

}
