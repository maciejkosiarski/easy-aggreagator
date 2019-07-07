<?php

declare(strict_types=1);

namespace MaciejKosiarski\EasyAggregator\Aggregator;

use MaciejKosiarski\EasyAggregator\Result;

interface Aggregator
{
    public function aggregate(array $toAggregate): Result;
}