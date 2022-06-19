<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\run;
use function cli\line;
use function cli\prompt;

const GAME_DESCRIPTION = 'What number is missing in the progression?';
const MIN_PROGRESSION_LENGTH = 5;
const MAX_PROGRESSION_LENGTH = 10;
const MIN_STEP_RANGE = 1;
const MAX_STEP_RANGE = 5;
const MIN_START_RANGE = -10;
const MAX_START_RANGE = 10;

function play(): void
{
    $round = function () {
        $length = rand(MIN_PROGRESSION_LENGTH, MAX_PROGRESSION_LENGTH);
        $step = rand(MIN_STEP_RANGE, MAX_STEP_RANGE);
        $start = rand(MIN_START_RANGE, MAX_START_RANGE);
        $progression = makeProgression($length, $step, $start);

        $itemId = rand(0, $length - 1);
        $hiddenItem = $progression[$itemId];
        $progression[$itemId] = '..';
        $progression = implode(' ', $progression);

        $answer = (int)prompt("Question: {$progression}");
        line("You answer: {$answer}");

        return[$answer, $hiddenItem];
    };

    run(GAME_DESCRIPTION, $round);
}

function makeProgression(int $length, int $step, int $start = 0): array
{
    $result = [$start];

    for ($i = 1; $i < $length; $i++) {
        $result[$i] = $result[$i - 1] + $step;
    }

    return $result;
}
