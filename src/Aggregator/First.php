<?php

declare(strict_types=1);

namespace MaciejKosiarski\EasyAggregator\Aggregator;

use MaciejKosiarski\EasyAggregator\Result;

class First implements Aggregator
{
    /**
     * @throws \Exception
     */
    public function aggregate(array $toAggregate): Result
    {
        $result = current($toAggregate);

        if (is_int($result)) {
            return new Result('int', (string)$result);
        }

        if (is_float($result)) {
            return new Result('float', (string)$result);
        }

        if (is_bool($result)) {
            return new Result('bool', (string)$result);
        }

        if (is_string($result)) {
            return new Result('string', (string)$result);
        }

        if (is_null($result)) {
            return new Result('null', (string)$result);
        }

        throw new \Exception(sprintf('First aggregator return invalid value type[%s] %s',gettype($result), $result));
    }
}