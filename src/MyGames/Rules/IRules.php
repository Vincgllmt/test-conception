<?php

declare(strict_types=1);

namespace MyGames\Rules;

interface IRules
{
    public function getGestures(): array;
    public function compare(string $gesture1, string $gesture2): int;
    public function checkGesture(string $gesture): bool;
}
