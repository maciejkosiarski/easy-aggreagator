<?php

declare(strict_types=1);

namespace MaciejKosiarski\EasyAggregator\Aggregator;

use MaciejKosiarski\EasyAggregator\Aggregator;

class Avg implements Aggregator
{
    public function aggregate(array $toAggregate): Result
    {
        $result = 0.0;

        foreach ($toAggregate as $element) {
            $result += (float)$element;
        }

        $result = $result / count($toAggregate);

        return new Result('float', (string)$result);
    }
}