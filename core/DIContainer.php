<?php

namespace core;

class DIContainer
{
    private static $instances = [];

    public static function register($key, $concrete)
    {
        self::$instances[$key] = $concrete;
    }

    public static function resolve($key)
    {
        if (array_key_exists($key, self::$instances)) {
            $concrete = self::$instances[$key];

            if (is_callable($concrete)) {
                return $concrete();
            } else {
                return new $concrete();
            }
        }

        throw new \Exception("Dependency not registered: $key");
    }
}