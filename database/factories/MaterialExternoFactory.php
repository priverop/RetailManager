<?php

use Faker\Generator as Faker;

$factory->define(App\MaterialExterno::class, function (Faker $faker) {
    return [
        'presupuesto_id' => $faker->numberBetween($min = 1, $max = 10),
    ];
});
