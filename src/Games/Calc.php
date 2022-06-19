<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\run;
use function cli\line;
use function cli\prompt;

const GAME_DESCRIPTION = 'What is the result of the expression?';
const MIN_RANGE = 1;
const MAX_RANGE = 2;
const OPERATIONS = ['+', '-', '*'];

function play(): void
{
    $round = function () {
        $a = rand(MIN_RANGE, MAX_RANGE);
        $b = rand(MIN_RANGE, MAX_RANGE);
        $operationId = rand(0, count(OPERATIONS) - 1);
        $operation = OPERATIONS[$operationId];
        $expression = "{$a} {$operation} {$b}";

        $answer = (int)prompt("Question: $expression");
        line("You answer: {$answer}");
        $correctAnswer = eval("return $expression;");

        return [$answer, $correctAnswer];
    };

    run(GAME_DESCRIPTION, $round);
}
