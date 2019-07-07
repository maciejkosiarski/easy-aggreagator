<?php

declare(strict_types=1);

namespace MaciejKosiarski\EasyAggregator\Exception;

use MaciejKosiarski\EasyAggregator\Factory;

class UndefinedManipulatorException extends \Exception
{
    public function __construct(string $manipulator)
    {
        $message = sprintf('Factory cant create [%s] Manipulator, available are: %s',
            $manipulator, implode(', ', Factory::MANIPULATORS));
        parent::__construct($message);
    }
}