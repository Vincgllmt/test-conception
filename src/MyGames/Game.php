<?php

declare(strict_types=1);

namespace MyGames;

use MyGames\Player\IPlayer;
use MyGames\Rules\IRules;

class Game
{
    private const score = 0;
    private IRules $rules;
    private Iplayer $player1;
    private Iplayer $player2;
    public function __construct(IRules $rules, IPlayer $player1, IPlayer $player2)
    {
        $this->rules = $rules;
        $this->player1 = $player1;
        $this->player2 = $player2;
    }
    public function play(int $turns): void
    {
    }
    public function playOneMove(): int
    {
    }
    public function getScore(): int
    {
        return self::score;
    }
    public function winner(): IPlayer
    {
    }
}
