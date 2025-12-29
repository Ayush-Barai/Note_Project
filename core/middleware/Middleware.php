<?php

namespace Core\Middleware;


class Middleware
{
    const MAP = [
        'guest' => Guest::class,
        'auth' => Auth::class,
    ];
    public static function resolve(string $key)
    {
        if (!$key) {
            return null;
        }

        if (!isset(self::MAP[$key])) {
            throw new \Exception("No matching middleware found for key '{$key}'.");
        }

        $class = self::MAP[$key];
        return (new $class())->handle();
    }
}