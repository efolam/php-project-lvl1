<?php

namespace BrainGames\Engine;

use function BrainGames\Games\Calc\play as playBrainCalc;
use function BrainGames\Games\Even\play as playBrainEven;
use function BrainGames\Games\GCD\play as playBrainGCD;
use function BrainGames\Games\Progression\play as playBrainProgression;
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

        case 'brain-gcd':
            playBrainGCD($name, $rounds);
            break;

        case 'brain-progression':
            playBrainProgression($name, $rounds);
            break;

        default:
            line("Game {$game} not found.");
            break;
    }
}
