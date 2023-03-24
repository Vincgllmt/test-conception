<?php

declare(strict_types=1);

namespace MyGames\Player;

use MyGames\Rules\IRules;

class Human extends Player
{
    protected function prompt(array $gestures): void
    {
        print_r($this->showPossibilities($gestures));
    }
    protected function showPossibilities(array $gestures): string
    {
        $possibilities = "";
        foreach ($gestures as $gesture) {
            $possibilities .= $gesture." ";
        }
        return $possibilities;
    }
    protected function getInput(): string
    {
        return readline("Veuillez choisir un mouvement : ");
    }
    public function playOneMove(IRules $rules): string
    {
        $this->prompt($rules->getGestures());
        return $this->getInput();
    }
}
