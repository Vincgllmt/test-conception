<?php

declare(strict_types=1);

namespace MyGames\Rules;

use MyGames\Rules\IRules;

class RockPaperScissors implements IRules
{
    public const PAPER='P';
    public const ROCK='R';
    public const SCISSORS='S';
    public const LIZARD = 'L';
    public const SPOCK = 'V';
    public const GESTURES=[self::ROCK, self::PAPER, self::SCISSORS, self::LIZARD, self::SPOCK];
    public function getGestures(): array
    {
        return self::GESTURES;
    }
        public const WIN_GESTURES = [
        self::ROCK => [self::SCISSORS, self::LIZARD],
        self::SCISSORS => [self::PAPER, self::LIZARD],
        self::PAPER => [self::ROCK, self::SPOCK],
        self::LIZARD => [self::PAPER, self::SPOCK],
        self::SPOCK => [self::ROCK, self::SCISSORS],
    ];
    public function compare(string $gesture1, string $gesture2): int
    {
        if ($gesture1 === $gesture2) {
            return 0;
        }
        return in_array($gesture2, self::WIN_GESTURES[$gesture1]) ? 1 : -1;
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
