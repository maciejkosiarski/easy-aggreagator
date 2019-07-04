<?php

declare(strict_types=1);

namespace MaciejKosiarski\EasyAggregator;

use MaciejKosiarski\EasyAggregator\Aggregator\Result;

class EasyAggregator
{
    /**
     * @throws Exception\UndefinedAggregatorException
     */
    public function aggregate(array $conditions, array $data): array
    {
        $factory = new Factory();
        $aggregated = [];

        $segregated = $this->segregate(array_keys($conditions), $data);

        foreach ($segregated as $key => $set) {
            $aggregator = $factory->create($conditions[$key]);

            $result = $aggregator->aggregate($set);

            $funcVal = Result::TYPES[$result->getType()];

            $aggregated[$key] = $funcVal($result->getValue());
        }

        return $aggregated;
    }

    private function segregate(array $keys, array $data): array
    {
        $segregated = [];

        foreach ($data as $element) {
            foreach ($element as $key => $item) {
                if (in_array($key, $keys)) {
                    $segregated[$key][] = $item;
                }
            }
        }

        return $segregated;
    }
}