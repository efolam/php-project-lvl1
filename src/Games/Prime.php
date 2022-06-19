<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\run;
use function cli\line;
use function cli\prompt;

const GAME_DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';
const MIN_RANGE = 1;
const MAX_RANGE = 100;

function play(): void
{
    $round = function () {
        $number = rand(MIN_RANGE, MAX_RANGE);

        $answer = prompt("Question: {$number}");
        line("You answer: {$answer}");
        $correctAnswer = isPrime($number) ? 'yes' : 'no';

        return [$answer, $correctAnswer];
    };

    run(GAME_DESCRIPTION, $round);
}

function isPrime(int $number): bool
{
    if ($number < 2) {
        return false;
    }

    for ($i = 2; $i <= $number / 2; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }

    return true;
}
