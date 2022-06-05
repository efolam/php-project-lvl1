<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;

function play()
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?");
    line("Hello {$name}");

    $rounds = 3;
    line('Answer "yes" if the number is even, otherwise answer "no".');

    round($name, $rounds);
}

function round(string $name = '', int $rounds = 0)
{
    $minRange = 1;
    $maxRange = 100;
    $number = rand($minRange, $maxRange);

    $answer = prompt("Question, {$number}");
    line("You answer: {$answer}");
    $correctAnswer = $number % 2 === 0 ? 'yes' : 'no';

    if ($answer === $correctAnswer) {
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
