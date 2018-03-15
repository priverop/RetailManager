<?php

use Faker\Generator as Faker;

$factory->define(App\Material::class, function (Faker $faker) {
    return [
        'nombre' => $faker->firstNameFemale,
        'tipo' => $faker->randomElement(['normal', 'electricidad', 'herrajes',
                    'complementos', 'piezasCompuestas','embalaje', 'acabados']),

    ];
});
