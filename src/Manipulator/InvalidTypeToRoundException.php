<?php

declare(strict_types=1);

namespace MaciejKosiarski\EasyAggregator\Manipulator;

class InvalidTypeToRoundException extends \Exception
{
    public function __construct(string $type)
    {
        parent::__construct(sprintf('Invalid type to round: [%s], should be "float"', $type));
    }
}