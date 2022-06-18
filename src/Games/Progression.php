<?php

namespace BrainGames\Games\Progression;

use function cli\line;
use function cli\prompt;

function play(string $name = '', int $rounds = 0): void
{
    line('What number is missing in the progression?');
    round($name, $rounds);
}

function round(string $name = '', int $rounds = 0): void
{
    $minProgressionLength = 5;
    $maxProgressionLength = 10;

    $minStepRange = 1;
    $maxStepRange = 5;

    $minStartRange = -10;
    $maxStartRange = 10;

    $progression = makeProgression(
        rand($minProgressionLength, $maxProgressionLength),
        rand($minStepRange, $maxStepRange),
        rand($minStartRange, $maxStartRange)
    );

    $progressionLength = count($progression);
    $itemId = rand(0, $progressionLength - 1);
    $hiddenItem = $progression[$itemId];
    $progression[$itemId] = '..';

    $progression = implode(' ', $progression);

    $answer = (int)prompt("Question: {$progression}");
    line("You answer: {$answer}");
    $correctAnswer = $hiddenItem;

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

function makeProgression(int $length, int $step, int $start = 0): array
{
    $result = [$start];

    for ($i = 1; $i < $length; $i++) {
        $result[$i] = $result[$i - 1] + $step;
    }

    return $result;
}
