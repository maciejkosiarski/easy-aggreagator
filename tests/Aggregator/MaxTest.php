<?php

declare(strict_types=1);

namespace MaciejKosiarski\EasyAggregator\Tests\Aggregator;

use MaciejKosiarski\EasyAggregator\Aggregator\Max;
use PHPUnit\Framework\TestCase;

class MaxTest extends TestCase
{
    public function testAvg(): void
    {
        $toAggregate = ['xyzz', 1,2,3.5,'4', '1.5', 'abc'];

        $aggregator = new Max();
        $result = $aggregator->aggregate($toAggregate);

        $this->assertEquals(4, $result->getValue());
    }
}