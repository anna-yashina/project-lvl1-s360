<?php

namespace BrainGames\GameEven;

use function BrainGames\Process\run as run_even;

class Even
{
    const DESCRIPTION = "Answer 'yes' if number even otherwise answer 'no'.";
    const RAND_MAX = 100;

    public function isEven($number)
    {
        return ($number % 2) == 0;
    }

    public function getQuestion()
    {
        return rand(0, self::RAND_MAX);
    }

    public function getResult($question)
    {
        return ($this->isEven($question)) ? 'yes' : 'no';
    }

    public function validate($answer)
    {
        $result = false;
        if (($answer == 'yes') || ($answer == 'no')) {
            $result = true;
        };
        return $result;
    }
}

function run()
{
    $even = new Even();
    run_even($even);
}
