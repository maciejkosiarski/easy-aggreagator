<?php

declare(strict_types=1);

namespace MaciejKosiarski\EasyAggregator\Aggregator;

use MaciejKosiarski\EasyAggregator\Result;

class Sum implements Aggregator
{
    public function aggregate(array $toAggregate): Result
    {
        $result = 0;

        foreach ($toAggregate as $element) {
            if (!is_int($element) && !is_float($element) ) {
                $element = (float)$element;
            }

            $result += $element;
        }

        if (is_int($result)) {
            return new Result('int', (string)$result);
        }

        return new Result('float', (string)$result);
    }
}