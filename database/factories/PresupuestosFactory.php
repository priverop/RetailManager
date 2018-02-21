<?php

use Faker\Generator as Faker;

$factory->define(App\Presupuesto::class, function (Faker $faker) {
    return [
        'nombre' => $faker->firstName(),
        'obra_id' => $faker->numberBetween($min = 1, $max = 10),
    ];
});
