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
    }
}
