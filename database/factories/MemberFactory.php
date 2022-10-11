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
       'gender' => $faker->randomElement(['f', 'm']),
       'birthday' => $faker->date($format = 'Y-m-d', $max = 'now'),
       'citizenship' => $faker->country(),
       'marital_status' => $faker->randomElement(Member::allMaritalStatus()),
       
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
       'professions' => $faker->jobTitle(),
       'occupations' => $faker->jobTitle(),
       'notes' => $faker->sentence,
       
       'registered_at' => $faker->date($format = 'Y-m-d', $max = 'now'),
       'is_active' => $faker->numberBetween(0, 1)
    ];
});
