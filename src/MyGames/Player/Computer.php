<?php

declare(strict_types=1);

namespace MyGames\Player;

use MyGames\Rules\IRules;

class Computer extends Player
{
    public function playOneMove(IRules $rules): string
    {
        $gestures = $rules->getGestures();
        return $gestures[rand(0, 2)];
    }
}
