<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */

// USERS FACTORY
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'level' => $faker->randomElement(['admin']),
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

// MEMBERS FACTORY
$factory->define(App\Member::class, function (Faker\Generator $faker) {
    $firstnames = $faker->firstName();
    $lastnames = $faker->lastName();
    $fullname = $firstnames.' '.$lastnames;
   
    return [
       // Personal
       'firstnames' => $firstnames,
       'lastnames' => $lastnames,
       'fullname' => $fullname,
       'gender' => $faker->randomElement(['f', 'm']),
       'birth_at' => $faker->date($format = 'Y-m-d', $max = 'now'),
       'birthplace' => $faker->country(),
       'civil_status' => $faker->numberBetween(0, 6),
       
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
       'professions' => $faker->randomElement(['Licenciado', 'Ingeniero', 'Doctor', 'Ninguno']),
       'occupations' => $faker->randomElement(['Comerciante', 'Transporte', 'Asistente', 'Desconocido']),
       'notes' => $faker->sentence,
       
       'registered_at' => $faker->date($format = 'Y-m-d', $max = 'now'),
       'status' => $faker->numberBetween(0, 1)
    ];
});

// MINISTRIES FACTORY
$factory->define(App\Ministry::class, function (Faker\Generator $faker) {
    return [
        'name' => 'Ministry '.$faker->numberBetween(1, 20),
        'description' => $faker->sentence
    ];
});

// VISITS FACTORY
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