<?php

use Faker\Generator as Faker;

$factory->define(App\Material::class, function (Faker $faker) {
    return [
        'nombre' => $faker->firstNameFemale,
        'precio' => $faker->randomNumber(2),
        'proveedor_id' => $faker->numberBetween($min = 1, $max = 10),
    ];
});
