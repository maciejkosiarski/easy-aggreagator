<?php

declare(strict_types=1);

namespace MaciejKosiarski\EasyAggregator;

use MaciejKosiarski\EasyAggregator\Aggregator\Aggregator;
use MaciejKosiarski\EasyAggregator\Exception\UndefinedAggregatorException;
use MaciejKosiarski\EasyAggregator\Exception\UndefinedManipulatorException;
use MaciejKosiarski\EasyAggregator\Manipulator\Manipulator;

class Factory
{
    const AGGREGATES = ['$sum','$avg','$max','$first','$last'];
    const MANIPULATORS = ['$round','$ucfirst'];

    /**
     * @throws UndefinedAggregatorException
     */
    public function createAggregator(string $aggregator): Aggregator
    {

        $class = sprintf('%s\\Aggregator\\%s', __NAMESPACE__, $this->getName($aggregator));

        if (class_exists($class)) {
            return new $class();
        }

        throw new UndefinedAggregatorException($aggregator);
    }

    /**
     * @throws UndefinedManipulatorException
     */
    public function createManipulator(string $manipulator): Manipulator
    {

        $class = sprintf('%s\\Manipulator\\%s', __NAMESPACE__, $this->getName($manipulator));

        if (class_exists($class)) {
            return new $class();
        }

        throw new UndefinedManipulatorException($manipulator);
    }

    private function getName(string $name): string
    {
        return ucfirst(str_replace('$', '', $name));
    }
}