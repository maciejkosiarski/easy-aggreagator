<?php

declare(strict_types=1);

namespace MaciejKosiarski\EasyAggregator\Manipulator;


use MaciejKosiarski\EasyAggregator\Result;

interface Manipulator
{
    public function manipulate(Result $result): Result;
}