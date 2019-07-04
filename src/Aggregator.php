<?php

declare(strict_types=1);

namespace MaciejKosiarski\EasyAggregator;

use MaciejKosiarski\EasyAggregator\Aggregator\Result;

interface Aggregator
{
    public function aggregate(array $toAggregate): Result;
}