<?php

declare(strict_types=1);

namespace MaciejKosiarski\EasyAggregator\Manipulator;

use MaciejKosiarski\EasyAggregator\Manipulator\Exception\InvalidTypeToManipulateException;
use MaciejKosiarski\EasyAggregator\Result;

class Ucfirst implements Manipulator
{
    /**
     * @throws InvalidTypeToManipulateException
     */
    public function manipulate(Result $result): Result
    {
        if ($result->getType() === 'string') {
            return new Result('string', ucfirst($result->getValue()));
        }

        throw new InvalidTypeToManipulateException($result->getType(), self::class);
    }
}