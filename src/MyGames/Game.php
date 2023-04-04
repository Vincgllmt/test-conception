<?php

declare(strict_types=1);

namespace MyGames;

use MyGames\Player\IPlayer;
use MyGames\Rules\IRules;

class Game
{
    private int $score;
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
        for ($i = 0; $i < $turns; $i++) {
            $player1name = $this->player1->getName();
            $player2name = $this->player2->getName();

            switch($this->playOneMove()) {
                case 1:
                    echo "$player1name wins this round\n";
                    $this->score += 1;
                    break;
                case 0:
                    echo "Draw\n";
                    break;
                case -1:
                    echo "$player2name wins this round\n";
                    $this->score -= 1;
                    break;
            }
        }
    }
    public function playOneMove(): int
    {
        $player1move = $this->player1->playOneMove($this->rules);
        $player2move = $this->player2->playOneMove($this->rules);
        return $this->rules->compare($player1move, $player2move);
    }
    public function getScore(): int
    {
        return self::score;
    }
    public function winner(): IPlayer
    {
        return $this->getScore() >= 0 ? $this->player1 : $this->player2;
    }
}
