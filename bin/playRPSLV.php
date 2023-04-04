#!/usr/bin/env php
<?php
declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use MyGames\Game;
use MyGames\Player\Computer;
use MyGames\Player\Human;
use MyGames\Rules\RockPaperScissorsLizardSpock;

$human = new Human("Bob");
$machine = new Computer('HAL');
$rps = new RockPaperScissorsLizardSpock();
$game = new Game($rps, $human, $machine);

$game->play(3);

echo "Score: " . $game->getScore() . "\n";
echo "Winner: " . $game->winner()->getName() . "\n";
