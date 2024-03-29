<?php

declare(strict_types=1);

namespace MaciejKosiarski\EasyAggregator\Manipulator;

use MaciejKosiarski\EasyAggregator\Manipulator\Exception\InvalidTypeToManipulateException;
use MaciejKosiarski\EasyAggregator\Result;

class Round implements Manipulator
{
    /**
     * Rounds result to two decimal places.
     * @throws InvalidTypeToManipulateException
     */
    public function manipulate(Result $result): Result
    {
        if ($result->getType() === 'float') {

            $funcVal = Result::TYPES[$result->getType()];
            $value = $funcVal($result->getValue());

            return new Result('float', (string)round($value, 2));
        }

        throw new InvalidTypeToManipulateException($result->getType(), self::class);
    }
}