<?php

use Illuminate\Database\Seeder;
use App\Http\Controllers\MaterialController;

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

        // Populate the pivot tables (Materiales-Partes & Materiales-Proveedores)
        $materiales = App\Material::all();
        $proveedores = App\Proveedor::all();
        App\Parte::all()->each(function ($parte) use ($materiales, $proveedores) {
            $parte->materiales()->attach(
              $parte->id, [
                'material_id'   => $parte->id,
                'proveedor_id'  => $parte->id,
                'unidades'      => rand(1,3),
                'ancho'         => rand(100,1000),
                'alto'         => rand(100,1000)
              ]);
        });
        App\Proveedor::all()->each(function ($proveedor) use ($materiales) {
            $proveedor->materiales()->attach(
                $proveedor->id, [
                  'material_id'  => $proveedor->id,
                  'precio'      => rand(1,100)
                ]
            );
        });

        MaterialController::refreshAllPropierties();
    }
}
