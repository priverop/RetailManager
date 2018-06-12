<?php

namespace App\Listeners;

use App\Events\MaterialParteModificado;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\DB;

class RefreshPropertiesMaterial
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  MaterialParteModificado  $event
     * @return void
     */
    public function handle(MaterialParteModificado $event)
    {
      $material_parte = DB::table('material_parte')
      ->where('material_id', $event->material_id)
      ->where('parte_id', $event->parte_id)
      ->first();

      $precio = DB::table('material_proveedor')
      ->where('material_id', $material_parte->material_id)
      ->where('proveedor_id', $material_parte->proveedor_id)
      ->select('precio', 'unidad', 'descuento', 'min_unidades')->first();

      $m2 = ($material_parte->largo * $material_parte->alto) / 1000000;
      $m3 = ($material_parte->largo * $material_parte->ancho * $material_parte->alto) / 1000000000;
      $total_m2 = $m2 * $material_parte->unidades;
      $total_m3 = $m3 * $material_parte->unidades;

      if($precio->min_unidades <= $material_parte->unidades){
        $descuento = $precio->descuento;
      }else{
        $descuento = 0;
      }

      if($precio->unidad == 'unidad'){
        $total = ( $precio->precio * $material_parte->unidades ) * ( 1 - ($descuento / 100) );
      }else if($precio->unidad == 'm2'){
        $total = ( $precio->precio * $total_m2 ) * ( 1 - ($descuento / 100) );
      }else if($precio->unidad == 'm3'){
        $total = ( $precio->precio * $total_m3 ) * ( 1 - ($descuento / 100) );
      }

      $update = DB::table('material_parte')
      ->where('material_id', $material_parte->material_id)
      ->where('parte_id', $material_parte->parte_id)
      ->update(
        ['m2' => $m2,
        'total_m2' => $total_m2,
        'm3' => $m3,
        'total_m3' => $total_m3,
        'descuento' => $descuento,
        'precio_total' => $total]
      );

    }
}
