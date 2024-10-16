<?php

namespace app;

class ClassA
{
    protected static string $name = 'A';

    public function getName(): string
    {
        return static::$name;
    }

    public static function make(): static
    {
        return new static();
    }
}