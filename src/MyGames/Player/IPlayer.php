<?php

declare(strict_types=1);

namespace MyGames\Player;

use MyGames\Rules\IRules;

interface IPlayer
{
    public function getName(): string;
    public function playOneMove(IRules $rules);
}
