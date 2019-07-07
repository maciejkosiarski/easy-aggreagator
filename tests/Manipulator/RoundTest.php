<?php

declare(strict_types=1);

namespace MaciejKosiarski\EasyAggregator\Tests\Manipulator;

use MaciejKosiarski\EasyAggregator\Manipulator\Exception\InvalidTypeToManipulateException;
use MaciejKosiarski\EasyAggregator\Manipulator\Round;
use MaciejKosiarski\EasyAggregator\Result;
use PHPUnit\Framework\TestCase;

class RoundTest extends TestCase
{
    /**
     * @throws \MaciejKosiarski\EasyAggregator\Manipulator\Exception\InvalidTypeToManipulateException
     */
    public function testRound()
    {
        $result = new Result('float', '2.33334');

        $manipulator = new Round();
        $manipulatedResult = $manipulator->manipulate($result);

        $funcVal = Result::TYPES[$manipulatedResult->getType()];
        $this->assertSame(2.33, $funcVal($manipulatedResult->getValue()));
        $this->assertSame('float', $manipulatedResult->getType());
        $this->assertSame('2.33', $manipulatedResult->getValue());
    }

    /**
     * @throws \MaciejKosiarski\EasyAggregator\Manipulator\Exception\InvalidTypeToManipulateException
     */
    public function testInvalidType()
    {
        $this->expectException(InvalidTypeToManipulateException::class);

        $result = new Result('string', '2');

        $manipulator = new Round();
        $manipulator->manipulate($result);
    }
}