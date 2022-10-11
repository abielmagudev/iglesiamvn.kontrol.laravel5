<?php

$factory->define(App\Visit::class, function (Faker\Generator $faker) {
    return [
       'fullname' => $faker->firstName.' '.$faker->lastName,
       'came_us' => $faker->paragraph,
       'contact' => $faker->sentence,
       'notes' => $faker->sentence,
       'visited_at' => $faker->date,
       'attended' => $faker->numberBetween(0, 1),
    ];
});
