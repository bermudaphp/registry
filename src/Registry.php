<?php


namespace Bermuda\Registry;


final class Registry
{
    private static array $items = [];

    private function __construct()
    {
    }

    /**
     * @param string $key
     * @param $value
     * @return mixed
     */
    public static function set(string $key, $value)
    {
        return static::$items[$key] = $value;
    }
    
    /**
     * @param string $key
     * @return bool
     */
    public static function has(string $key)
    {
        return array_key_exists($key, static::$items);
    }

    /**
     * @param string $key
     * @param null $default
     * @return mixed|null
     */
    public static function get(string $key, $default = null)
    {
        return static::$items[$key] ?? $default;
    }
}
