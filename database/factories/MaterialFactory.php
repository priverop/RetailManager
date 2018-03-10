<?php

use Faker\Generator as Faker;

$factory->define(App\Material::class, function (Faker $faker) {
    return [
        'nombre' => $faker->firstNameFemale,
        'proveedor_id' => $faker->numberBetween($min = 1, $max = 10),
    ];
});
