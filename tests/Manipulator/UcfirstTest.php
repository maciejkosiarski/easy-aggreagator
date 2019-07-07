<?php

declare(strict_types=1);

namespace MaciejKosiarski\EasyAggregator\Tests\Manipulator;

use MaciejKosiarski\EasyAggregator\Manipulator\Exception\InvalidTypeToManipulateException;
use MaciejKosiarski\EasyAggregator\Manipulator\Ucfirst;
use MaciejKosiarski\EasyAggregator\Result;
use PHPUnit\Framework\TestCase;

class UcfirstTest extends TestCase
{

    /**\
     * @throws InvalidTypeToManipulateException
     */
    public function testRound()
    {
        $result = new Result('string', 'maciej');

        $manipulator = new Ucfirst();
        $manipulatedResult = $manipulator->manipulate($result);

        $funcVal = Result::TYPES[$manipulatedResult->getType()];
        $this->assertSame('Maciej', $funcVal($manipulatedResult->getValue()));
        $this->assertSame('string', $manipulatedResult->getType());
        $this->assertSame('Maciej', $manipulatedResult->getValue());
    }

    /**
     * @throws InvalidTypeToManipulateException
     */
    public function testInvalidType()
    {
        $this->expectException(InvalidTypeToManipulateException::class);

        $result = new Result('float', '2');

        $manipulator = new Ucfirst();
        $manipulator->manipulate($result);
    }
}