# easy-aggreagator
Simple lib to aggregate arrays in PHP

Installation
============

### Step 1: Download the Bundle

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

```console
$ composer require maciejkosiarski/easy-aggregator
```

This command requires you to have Composer installed globally, as explained
in the [installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

Simple example:

```php
<?php

 $array = [
    [
        'a' => 1,
        'b' => 2,
        'c' => 3,
        'd' => 7,
        'e' => 4,
    ],
    [
        'a' => 3,
        'b' => 3,
        'c' => 1,
        'd' => 5,
        'e' => 4,
    ],
    [
        'a' => 1,
        'b' => 4,
        'c' => 2,
        'd' => 6,
        'e' => 5,
    ],
];
 
 $conditions = [
     'a' => '$sum',
     'b' => '$avg',
     'c' => '$max',
     'd' => '$first',
     'e' => '$last',
 ];
 
 $aggregator = new EasyAggregator();
 $aggregated = $aggregator->aggregate($conditions, $array);
 
 dump($aggregated);
 
 ```
 
 Output:
 
 ```php
 
 [
     'a' => 5,
     'b' => 3,
     'c' => 3,
     'd' => 7,
     'e' => 5,
 ];
 
 ```
 
 
