<?php

namespace BrainGames\Games\Prime;

use function cli\line;
use function cli\prompt;

function play(string $name = '', int $rounds = 0): void
{
    line('Answer "yes" if given number is prime. Otherwise answer "no".');
    round($name, $rounds);
}

function round(string $name = '', int $rounds = 0): void
{
    $minRange = 1;
    $maxRange = 100;

    $number = rand($minRange, $maxRange);

    $answer = prompt("Question: {$number}");
    line("You answer: {$answer}");
    $correctAnswer = isPrime($number) ? 'yes' : 'no';

    if ($answer == $correctAnswer) {
        line('Correct!');

        if ($rounds > 1) {
            round($name, $rounds - 1);
        } else {
            line("Congratulations, {$name}!");
        }
    } else {
        line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
        line("Let's try again, {$name}!");
    }
}

function isPrime(int $number): bool
{
    if ($number === 2) {
        return true;
    }

    if ($number % 2 === 0) {
        return false;
    }

    $i = 3;
    $max_factor = (int)sqrt($number);

    while ($i <= $max_factor) {
        if ($number % $i === 0) {
            return false;
        }

        $i += 2;
    }

    return true;
}
