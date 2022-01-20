<?php

namespace Bermuda\Registry;

/**
 * Class Registry
 * Superglobal key => value pairs storage
 * @package Bermuda\Registry
 */
final class Registry implements \ArrayAccess, \IteratorAggregate
{
    private array $elements = [];
    private static ?Registry $instance = null;
    
    private function __construct(){}
    
    public static function getInstance(): self
    { 
        return self::$instance == null ? self::$instance = new self() : self::$instance;
    }

    /**
     * @return ArrayIterator
     */
    public function getIterator(): \ArrayIterator
    {
        return new \ArrayIterator($this->elements);
    }
    
    /**
     * @inheritDoc
     */
    public function offsetSet($offset, $value): void
    {
       $offset == null ? $this->elements[] = $value 
           : $this->elements[$offset] = $value;
    }

    /**
     * @inheritDoc
     */
    public function offsetExists($offset): bool
    {
        return array_key_exists($offset, $this->elements);
    }

    /**
     * @inheritDoc
     */
    public function offsetUnset($offset): void
    {
        unset($this->elements[$offset]);
    }

    /**
     * @inheritDoc
     */
    public function offsetGet($offset): mixed
    {
        return $this->elements[$offset] ?? null;
    }
    
    /**
     * @param string $key
     * @param $value
     * @return mixed
     */
    public static function set(string $key, $value)
    {
        self::getInstance()->offsetSet($key, $value);
        return $value;
    }
    
    /**
     * @param string $key
     * @return bool
     */
    public static function has(string $key): bool
    {
        return self::getInstance()->offsetExists($key);
    }
    
    /**
     * @param string $key
     * @return bool
     */
    public static function remove(string $key): void
    {
        self::getInstance()->offsetUnset($key);
    }

    /**
     * @param string $key
     * @param null $default
     * @return mixed|null
     */
    public static function get(string $key, $default = null)
    {
        return static::getInstance()->offsetGet($key) ?? $default;
    }
}
