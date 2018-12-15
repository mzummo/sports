<?php

use Faker\Generator as Faker;
// use App\Team as Team;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Player::class, function (Faker $faker) {
    //$team = Team::all()->pluck('id')->toArray();

    return [
        'firstName' => $faker->firstName,
        'lastName' => $faker->lastName,
        // the team its linked to
    ];
});
