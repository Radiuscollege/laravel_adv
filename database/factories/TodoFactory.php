<?php

use Faker\Generator as Faker;

$factory->define(App\Todo::class, function (Faker $faker) {
    return [
        'title'         => $faker->sentence(5),
        'description'   => $faker->text(190),
        'deadline'      => $faker->dateTimeBetween('-2years', '+2years'),
        'completed_at'  => $faker->dateTimeBetween('-2years', '+2years'),
        'priority'      => $faker->numberBetween(1, 5)
    ];
});
