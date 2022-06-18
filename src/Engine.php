<?php

namespace BrainGames\Engine;

use function BrainGames\Games\Calc\play as playBrainCalc;
use function BrainGames\Games\Even\play as playBrainEven;
use function cli\line;
use function cli\prompt;

function play($game): void
{
    $rounds = 3;

    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?");
    line("Hello {$name}");

    switch ($game) {
        case 'brain-even':
            playBrainEven($name, $rounds);
            break;

        case 'brain-calc':
            playBrainCalc($name, $rounds);
            break;

        default:
            line("Game {$game} not found.");
            break;
    }
}
