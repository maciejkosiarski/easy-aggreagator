<?php

declare(strict_types=1);

namespace MaciejKosiarski\EasyAggregator\Tests;

use MaciejKosiarski\EasyAggregator\Aggregator\Aggregator;
use MaciejKosiarski\EasyAggregator\Exception\UndefinedAggregatorException;
use MaciejKosiarski\EasyAggregator\Factory;
use PHPUnit\Framework\TestCase;

class FactoryTest extends TestCase
{
    /**
     * @throws \MaciejKosiarski\EasyAggregator\Exception\UndefinedAggregatorException
     */
    public function testCreating(): void
    {
        $factory = new Factory();

        foreach (Factory::AGGREGATES as $aggregator) {
            $a = $factory->create($aggregator);

            $this->assertInstanceOf(Aggregator::class, $a);
        }
    }

    /**
     * @throws UndefinedAggregatorException
     */
    public function testUndefinedAggregator()
    {
        $this->expectException(UndefinedAggregatorException::class);
        $factory = new Factory();
        $factory->create('$fakeAggregator');
    }
}