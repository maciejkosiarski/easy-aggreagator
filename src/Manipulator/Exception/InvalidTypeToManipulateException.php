<?php

declare(strict_types=1);

namespace MaciejKosiarski\EasyAggregator\Manipulator\Exception;

class InvalidTypeToManipulateException extends \Exception
{
    public function __construct(string $type, string $manipulator)
    {
        parent::__construct(sprintf('%s get invalid type: [%s]', $manipulator, $type));
    }
}