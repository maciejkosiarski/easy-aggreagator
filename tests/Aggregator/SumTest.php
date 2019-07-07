<?php

declare(strict_types=1);

namespace MaciejKosiarski\EasyAggregator\Tests\Aggregator;

use MaciejKosiarski\EasyAggregator\Aggregator\Sum;
use MaciejKosiarski\EasyAggregator\Result;
use PHPUnit\Framework\TestCase;

class SumTest extends TestCase
{
    public function testSum(): void
    {
        $toAggregate = [1,2,3.5,'4', '1.5', 'abc'];

        $aggregator = new Sum();
        $result = $aggregator->aggregate($toAggregate);

        $funcVal = Result::TYPES[$result->getType()];

        $this->assertIsFloat($funcVal($result->getValue()));
        $this->assertEquals(12.0, $result->getValue());
    }
}