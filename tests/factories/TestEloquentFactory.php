<?php

use CaoMinhDuc\LivewireDatatable\Tests\Model\TestEloquent;

$factory->define(TestEloquent::class, function (Faker\Generator $faker) {

    return [
        'string_column' => $faker->name,
    ];
});
