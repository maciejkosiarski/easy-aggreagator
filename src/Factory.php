<?php

declare(strict_types=1);

namespace MaciejKosiarski\EasyAggregator;

use MaciejKosiarski\EasyAggregator\Exception\UndefinedAggregatorException;

class Factory
{
    const AGGREGATES = ['$sum','$avg','$max','$first','$last'];

    /**
     * @throws UndefinedAggregatorException
     */
    public function create(string $aggregator): Aggregator
    {

        $class = sprintf('%s\\Aggregator\\%s', __NAMESPACE__, $this->getName($aggregator));

        if (class_exists($class)) {
            return new $class();
        }

        throw new UndefinedAggregatorException($aggregator);
    }

    private function getName(string $aggregator): string
    {
        return ucfirst(str_replace('$', '', $aggregator));
    }
}