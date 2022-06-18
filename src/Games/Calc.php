<?php

namespace BrainGames\Games\Calc;

use function cli\line;
use function cli\prompt;

function play(string $name = '', int $rounds = 0): void
{
    line('What is the result of the expression?');
    round($name, $rounds);
}

function round(string $name = '', int $rounds = 0): void
{
    $minRange = 1;
    $maxRange = 10;
    $operations = ['+', '-', '*'];

    $number1 = rand($minRange, $maxRange);
    $number2 = rand($minRange, $maxRange);
    $operation = $operations[rand(0, 2)];

    $expression = "{$number1} {$operation} {$number2}";

    $answer = (int)prompt("Question: $expression");
    line("You answer: {$answer}");
    $correctAnswer = eval("return $expression;");

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
