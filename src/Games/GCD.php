<?php

namespace BrainGames\Games\GCD;

use function cli\line;
use function cli\prompt;

function play(string $name = '', int $rounds = 0): void
{
    line('Find the greatest common divisor of given numbers.');
    round($name, $rounds);
}

function round(string $name = '', int $rounds = 0): void
{
    $minRange = 1;
    $maxRange = 20;

    $num1 = rand($minRange, $maxRange);
    $num2 = rand($minRange, $maxRange);

    $answer = prompt("Question: {$num1} {$num2}");
    line("You answer: {$answer}");
    $correctAnswer = gcd($num1, $num2);

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

function gcd(int $num1, int $num2): int
{
    return ($num1 % $num2) ? gcd($num2, $num1 % $num2) : $num2;
}
