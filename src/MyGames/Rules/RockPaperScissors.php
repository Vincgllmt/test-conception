<?php

declare(strict_types=1);

namespace src\MyGames\Rules;

class RockPaperScissors
{
    public const PAPER='P';
    public const ROCK='R';
    public const SCISSORS='S';
    public const GESTURES=[self::ROCK, self::PAPER, self::SCISSORS];
    public function getGestures(): array
    {
        return self::GESTURES;
    }
    public function compare(string $gesture1, string $gesture2): int
    {
        if ($gesture1 == $gesture2) {
            return 0;
        } else {
            if ($gesture1 == self::PAPER) {
                return match ($gesture2) {
                    'R' => 1,
                    default => -1,
                };
            }
            if ($gesture1 == self::ROCK) {
                return match ($gesture2) {
                    'S' => 1,
                    default => -1,
                };
            }
            if ($gesture1 == self::SCISSORS) {
                return match ($gesture2) {
                    'P' => 1,
                    default => -1,
                };
        }
    }
}
