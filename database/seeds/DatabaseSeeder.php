<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Cliente::class, 10)->create();
        factory(App\Obra::class, 10)->create();
        factory(App\Proveedor::class, 10)->create();
        factory(App\Presupuesto::class, 10)->create();
        factory(App\Parte::class, 10)->create();
        factory(App\Material::class, 10)->create();
        // factory(App\MaterialParte::class, 10)->create();

        // Get all the roles attaching up to 3 random roles to each user
        $materiales = App\Material::all();

        // Populate the pivot table
        App\Parte::all()->each(function ($parte) use ($materiales) {
            $parte->materiales()->attach(
                $materiales->random(rand(1, 10))->pluck('id')->toArray()
            );
        });
    }
}
