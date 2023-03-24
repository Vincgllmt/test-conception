<?php

declare(strict_types=1);

namespace MyGames\Rules;

use MyGames\Rules\IRules;

class RockPaperScissors implements IRules
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
        return 0;
    }
    public function checkGesture(string $gesture): bool
    {
        $bool = false;
        foreach (self::GESTURES as $geste) {
            if ($geste == $gesture) {
                $bool = true;
            }
        }
        return $bool;
    }
    protected function gestureIndex(string $gesture): int
    {
        $index = -1;
        for ($i = 0; $i < 2; $i++) {
            if (self::GESTURES[$i] == $gesture) {
                $index = $i;
            }
        }
        return $index;
    }
}
