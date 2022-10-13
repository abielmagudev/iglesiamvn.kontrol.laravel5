<?php

use App\Member;

$factory->define(Member::class, function (Faker\Generator $faker) {

    $name = $faker->firstName();
    $lastname = $faker->lastName();
    $fullname = implode(' ', [$name, $lastname]);
   
    return [
       // Personal
       'name' => $name,
       'lastname' => $lastname,
       'fullname' => $fullname,
       'gender' => $faker->randomElement(Member::genderKeys()),
       'date_birth' => $faker->date($format = 'Y-m-d', $max = 'now'),
       'place_birth' => $faker->country(),
       
       // Contact
       'address' => $faker->streetAddress(),
       'postcode' => $faker->postcode,
       'city' => $faker->city(),
       'state' => $faker->state(),
       'country' => $faker->country(),
       'homephone' => $faker->phoneNumber,
       'mobilephone' => $faker->phoneNumber,
       'email' => $faker->unique()->safeEmail(),
       'emergency' => $faker->phoneNumber,
       
       // Additional
       'marital_status' => $faker->randomElement(Member::maritalStatusKeys()),
       'professions' => $faker->jobTitle(),
       'occupations' => $faker->jobTitle(),
       'notes' => $faker->sentence,
       
       // Instance
       'registered_at' => $faker->date($format = 'Y-m-d', $max = 'now'),
       'is_active' => $faker->numberBetween(0, 1),
    ];
});
