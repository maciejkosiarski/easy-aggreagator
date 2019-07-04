<?php

declare(strict_types=1);

namespace MaciejKosiarski\EasyAggregator\Aggregator;


class Result
{
    const TYPE_INT = 'intval';
    const TYPE_FLOAT = 'floatval';
    const TYPE_BOOL = 'boolval';
    const TYPE_STRING = 'strval';

    const TYPES = [
        'int' => self::TYPE_INT,
        'float' => self::TYPE_FLOAT,
        'bool' => self::TYPE_BOOL,
        'string' => self::TYPE_STRING,
    ];

    private $type;
    private $value;

    public function __construct(string $type, string $value)
    {
        $this->type = $type;
        $this->value = $value;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}