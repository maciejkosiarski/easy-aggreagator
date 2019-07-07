<?php

declare(strict_types=1);

namespace MaciejKosiarski\EasyAggregator\Tests\Aggregator;

use MaciejKosiarski\EasyAggregator\Aggregator\First;
use MaciejKosiarski\EasyAggregator\Result;
use PHPUnit\Framework\TestCase;

class FirstTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testInt(): void
    {
        $toAggregate = [1,2,3.5,'4', '1.5', 'abc'];

        $aggregator = new First();
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
        $toAggregate = [null,2,3.5,'4', '1.5', 'abc'];

        $aggregator = new First();
        $result = $aggregator->aggregate($toAggregate);

        $this->assertEquals('null', $result->getType());
        $this->assertEquals('', $result->getValue());
    }

    /**
     * @throws \Exception
     */
    public function testFloat(): void
    {
        $toAggregate = [1.1,2,3.5,'4', '1.5', 'abc'];

        $aggregator = new First();
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
        $toAggregate = [true,2,3.5,'4', '1.5', 'abc'];

        $aggregator = new First();
        $result = $aggregator->aggregate($toAggregate);

        $funcVal = Result::TYPES[$result->getType()];

        $this->assertIsBool($funcVal($result->getValue()));
        $this->assertEquals(1, $result->getValue());
    }
}