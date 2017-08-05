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

use App\Models\ProjectInfo;
use App\Models\User;
use Faker\Generator;
use App\Models\Project;

$factory->define(User::class, function (Generator $faker) {
    static $password;

    return [
        'fname'             => $faker->firstName,
        'uuid'              => uuid(),
        'lname'             => $faker->lastName,
        'email'             => $faker->unique()->safeEmail,
        'password'          => $password ?? $password = bcrypt('123123'),
        'remember_token'    => str_random(10),
        'active'            => $faker->boolean(70)
    ];
});

$factory->define(Project::class, function (Generator $faker) {
    $users  = User::all()->pluck('id')->toArray();
    $name   = $faker->name;
    $date   = $faker->date('Y-m-d h:i:s');

    return [
        'uuid'          => uuid(),
        'name'          => $name,
        'slug'          => snake_case($name),
        'description'   => $faker->sentence,
        'start_date'    => $date,
        'end_date'      => carbon()->parse($date)->addMonths(3),
        'stage_id'      => 2,
        'active'        => $faker->boolean,
        'created_by'    => $users[array_rand($users)],
        'created_at'    => carbon()->now()
    ];
});

$factory->define(ProjectInfo::class, function (Generator $faker) {
    $projects   = Project::select(['id', 'created_by'])->get()->toArray();
    $project    =  $projects[array_rand($projects)];

    return [
        'uuid'          => uuid(),
        'project_id'    => $project['id'],
        'title'         => $faker->title,
        'url'           => $faker->imageUrl(),
        'details'       => $faker->sentence,
        'created_by'    => $project['created_by'],
        'created_at'    => carbon()->now()
    ];
});
