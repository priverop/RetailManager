<?php

use Faker\Generator as Faker;

$factory->define(App\Proveedor::class, function (Faker $faker) {
    return [
        'nombre'        => $faker->firstName,
        'direccion'     => $faker->address,
        'cp' => $faker->randomNumber(5),
        'provincia'     => $faker->city,
        'telefono'      => $faker->randomNumber(9),
        'nif'           => $faker->randomNumber(9)
    ];
});
