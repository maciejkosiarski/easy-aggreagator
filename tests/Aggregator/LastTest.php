<?php

declare(strict_types=1);

namespace MaciejKosiarski\EasyAggregator\Tests\Aggregator;

use MaciejKosiarski\EasyAggregator\Aggregator\Last;
use MaciejKosiarski\EasyAggregator\Aggregator\Result;
use PHPUnit\Framework\TestCase;

class LastTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testInt(): void
    {
        $toAggregate = [1,2,3.5,'4', '1.5', 'abc', 1];

        $aggregator = new Last();
        $result = $aggregator->aggregate($toAggregate);

        $funcVal = Result::TYPES[$result->getType()];

        $this->assertIsInt($funcVal($result->getValue()));
        $this->assertEquals(1, $result->getValue());
    }

    /**
     * @throws \Exception
     */
    public function testNull(): void
    {
        $toAggregate = [null,2,3.5,'4', '1.5', 'abc', null];

        $aggregator = new Last();
        $result = $aggregator->aggregate($toAggregate);

        $this->assertEquals('null', $result->getType());
        $this->assertEquals('', $result->getValue());
    }

    /**
     * @throws \Exception
     */
    public function testFloat(): void
    {
        $toAggregate = [1.1,2,3.5,'4', '1.5', 'abc', 1.1];

        $aggregator = new Last();
        $result = $aggregator->aggregate($toAggregate);

        $funcVal = Result::TYPES[$result->getType()];

        $this->assertIsFloat($funcVal($result->getValue()));
        $this->assertEquals(1.1, $result->getValue());
    }

    /**
     * @throws \Exception
     */
    public function testBool(): void
    {
        $toAggregate = [true,2,3.5,'4', '1.5', 'abc', true];

        $aggregator = new Last();
        $result = $aggregator->aggregate($toAggregate);

        $funcVal = Result::TYPES[$result->getType()];

        $this->assertIsBool($funcVal($result->getValue()));
        $this->assertEquals(1, $result->getValue());
    }
}