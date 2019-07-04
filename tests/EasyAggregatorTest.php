<?php

declare(strict_types=1);

namespace MaciejKosiarski\EasyAggregator\Tests;

use MaciejKosiarski\EasyAggregator\EasyAggregator;
use PHPUnit\Framework\TestCase;

class EasyAggregatorTest extends TestCase
{
    /**
     * @throws \MaciejKosiarski\EasyAggregator\Exception\UndefinedAggregatorException
     */
    public function testAggregate()
    {
        $conditions = [
            'a' => '$sum',
            'b' => '$avg',
            'c' => '$max',
            'd' => '$first',
            'e' => '$last',
        ];

        $aggregator = new EasyAggregator();
        $aggregated = $aggregator->aggregate($conditions, $this->getTestData());

        $this->assertEquals($this->getExpected(), $aggregated);
    }

    private function getTestData(): array
    {
        return [
            [
                'a' => 1,
                'b' => 2,
                'c' => 3,
                'd' => 7,
                'e' => 4,
            ],
            [
                'a' => 3,
                'b' => 3,
                'c' => 1,
                'd' => 5,
                'e' => 4,
            ],
            [
                'a' => 1,
                'b' => 4,
                'c' => 2,
                'd' => 6,
                'e' => 5,
            ],
        ];
    }

    private function getExpected(): array
    {
        return [
            'a' => 5,
            'b' => 3,
            'c' => 3,
            'd' => 7,
            'e' => 5,
        ];
    }
}