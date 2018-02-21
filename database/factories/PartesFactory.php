<?php

use Faker\Generator as Faker;

$factory->define(App\Parte::class, function (Faker $faker) {
    return [
        'nombre' => $faker->firstName(),
        'presupuesto_id' => $faker->numberBetween($min = 1, $max = 10),
    ];
});
