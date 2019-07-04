<?php

declare(strict_types=1);

namespace MaciejKosiarski\EasyAggregator\Exception;

use MaciejKosiarski\EasyAggregator\Factory;

class UndefinedAggregatorException extends \Exception
{
    public function __construct(string $aggregator)
    {
        $message = sprintf('Factory cant create [%s] Aggregator, available are: %s',
            $aggregator, implode(', ', Factory::AGGREGATES));
        parent::__construct($message);
    }
}