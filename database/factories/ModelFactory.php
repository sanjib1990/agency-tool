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
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'fname'             => $faker->firstName,
        'uuid'              => uuid(),
        'lname'             => $faker->lastName,
        'email'             => $faker->unique()->safeEmail,
        'password'          => $password ?? $password = bcrypt('123123'),
        'remember_token'    => str_random(10),
        'active'            => $faker->boolean(70),
        'avatar'            => $faker->imageUrl()
    ];
});
