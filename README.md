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
        'a' => 1.5,
        'b' => 2.456,
        'c' => 3,
        'd' => false,
        'e' => 'peter',
    ],
    [
        'a' => 3,
        'b' => 3.456,
        'c' => 1,
        'd' => true,
        'e' => 'john',
    ],
    [
        'a' => 1,
        'b' => 4.4567,
        'c' => 2,
        'd' => false,
        'e' => 'mark',
    ],
];
 
 $conditions = [
     'a' => '$sum',
     'b' => '$avg',
     'c' => '$max',
     'd' => '$first',
     'e' => '$last',
 ];
 
 //Are optional
 $manipulators = [
    'b' => '$round',
    'e' => '$ucfirst',
];
 
 $aggregator = new EasyAggregator();
 $aggregated = $aggregator->aggregate($array, $conditions, $manipulators);
 
 dump($aggregated);
 
 ```
 
 Output:
 
 ```php
 
 [
     'a' => 5.5,
     'b' => 3.46,
     'c' => 3,
     'd' => false,
     'e' => 'Mark',
 ];
 
 ```
 
 
