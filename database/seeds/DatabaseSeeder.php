<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MaterialController;
use App\Events\PresupuestoModificado;
use App\Events\MaterialParteModificado;

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
        factory(App\Proveedor::class, 40)->create();
        factory(App\Presupuesto::class, 10)->create();
        factory(App\Parte::class, 10)->create();
        factory(App\Material::class, 40)->create();
        factory(App\MaterialExterno::class, 40)->create();

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
        // Creamos el Proveedor Sin Nombre
        DB::table('proveedors')->insert([
          'nombre'        => "Sin Proveedor",
          'direccion'     => "Sin dirección",
          'codigo-postal' => 000000,
          'provincia'     => "Madrid",
          'telefono'      => 666666666,
          'nif'           => 00000000,
        ]);

        // Actualizamos la info de los materiales_parte que hemos introducido.
        $materiales_parte = DB::table('material_parte')->get();
        foreach ($materiales_parte as $key => $value) {
          event(new MaterialParteModificado($value->material_id, $value->parte_id));
        }


        // Actualizamos todos los precios de los Presupuestos y Obras
        $presupuestos = App\Presupuesto::all();
        foreach($presupuestos as $key => $value){
          event(new PresupuestoModificado($value));
        }

    }
}
