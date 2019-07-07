<?php

declare(strict_types=1);

namespace MaciejKosiarski\EasyAggregator;

class EasyAggregator
{
    /**
     * @throws Exception\UndefinedAggregatorException
     * @throws Exception\UndefinedManipulatorException
     */
    public function aggregate(array $data, array $conditions, array $manipulations = []): array
    {
        $factory = new Factory();
        $aggregated = [];

        $segregated = $this->segregate(array_keys($conditions), $data);

        foreach ($segregated as $key => $set) {
            $aggregator = $factory->createAggregator($conditions[$key]);

            $result = $aggregator->aggregate($set);
            $aggregated[$key] = $result;
        }

        return $this->normalizeResults($this->manipulate($aggregated, $manipulations));
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

    /**
     * @throws Exception\UndefinedManipulatorException
     */
    private function manipulate(array $aggregated, array $manipulations): array
    {
        $factory = new Factory();

        foreach ($aggregated as $key => $value) {
            if (array_key_exists($key, $manipulations)) {
                $manipulator = $factory->createManipulator($manipulations[$key]);

                $result = $manipulator->manipulate($value);
                $aggregated[$key] = $result;
            }
        }

        return $aggregated;
    }

    private function normalizeResults(array $results)
    {
        foreach ($results as $key => $result) {
            if ($result->getType() === 'null') {
                $results[$key] = null;
                continue;
            }

            $funcVal = Result::TYPES[$result->getType()];
            $results[$key] = $funcVal($result->getValue());
        }

        return $results;
    }
}
