<?php

$factory->define(App\Ministry::class, function (Faker\Generator $faker) {
    return [
        'name' => 'Ministry '.$faker->numberBetween(1, 20),
        'description' => $faker->sentence
    ];
});
