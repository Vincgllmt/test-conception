#!/usr/bin/env php
<?php

require_once __DIR__ . '/../vendor/autoload.php';

use MyGames\Game;
use MyGames\Player\Computer;
use MyGames\Player\Human;
use MyGames\Rules\RockPaperScissors;

$human = new Human("Bob");
$machine = new Computer('HAL');
$rps = new RockPaperScissors();
$game = new Game($rps, $human, $machine);

$game->play(3);

echo "Score: " . $game->getScore() . "\n";
echo "Winner: " . $game->winner()->getName() . "\n";
