<?php

use Faker\Generator as Faker;

$factory->define(App\Obra::class, function (Faker $faker) {
    return [
        'cliente_id'  => $faker->numberBetween($min = 1, $max = 10),
        'fecha'       => $faker->date($format = 'Y-m-d', $max = 'now'),
    ];
});
