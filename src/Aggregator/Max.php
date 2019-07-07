<?php

declare(strict_types=1);

namespace MaciejKosiarski\EasyAggregator\Aggregator;

use MaciejKosiarski\EasyAggregator\Result;

class Max implements Aggregator
{
    public function aggregate(array $toAggregate): Result
    {
        $result = max(array_map(function ($el) {
            if (is_int($el)) {
                return $el;
            }

            if (is_float($el)) {
                return $el;
            }

            return (float) $el;
        }, $toAggregate));

        $type = (is_float($result)) ? 'float' : 'int';

        return new Result($type, (string)$result);
    }
}