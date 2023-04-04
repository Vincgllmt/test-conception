<?php

namespace MyGames\Rules\Gestures;
use ReflectionClass;
class Gestures implements IGestures
{
    public function getGestures(): array
    {
        $reflection = new ReflectionClass(static::class);
        return array_values($reflection->getConstants());
    }
}