<?php

use Faker\Generator as Faker;

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

$factory->define(App\Answer::class, function (Faker $faker) {
    return [
        'odgovor' => $faker->paragraph(),
        'ticket_id' => rand(1,150),
        'created_at' =>$faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null),
        'admin_id' => rand(1,10)
    ];
});
