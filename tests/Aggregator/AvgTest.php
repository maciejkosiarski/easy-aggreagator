<?php

declare(strict_types=1);

namespace MaciejKosiarski\EasyAggregator\Tests\Aggregator;

use MaciejKosiarski\EasyAggregator\Aggregator\Avg;
use MaciejKosiarski\EasyAggregator\Aggregator\Result;
use PHPUnit\Framework\TestCase;

class AvgTest extends TestCase
{
    public function testAvg(): void
    {
        $toAggregate = [1,2,3.5,'4', '1.5', 'abc'];

        $aggregator = new Avg();
        $result = $aggregator->aggregate($toAggregate);

        $funcVal = Result::TYPES[$result->getType()];

        $this->assertIsFloat($funcVal($result->getValue()));
        $this->assertEquals(2.0, $result->getValue());
    }
}