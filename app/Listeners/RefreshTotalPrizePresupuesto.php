<?php

namespace App\Listeners;

use App\Events\PresupuestoModificado;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\DB;

class RefreshTotalPrizePresupuesto
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
     * @param  PresupuestoModificado $event
     * @return void
     */
    public function handle(PresupuestoModificado $event)
    {
      $presupuesto_id = $event->presupuesto->id;
      $presupuesto = $event->presupuesto;

      $prizes = DB::table("material_parte")
      ->select('precio_total')
      ->join('partes', function($join) use ($presupuesto_id){
        $join->on('material_parte.parte_id', '=', 'partes.id')
        ->where('partes.presupuesto_id', '=', $presupuesto_id);
      })
      ->get();

      $precioTotal = 0;

      foreach($prizes as $key => $value){
        $precioTotal += $value->precio_total;
      }

      $presupuesto->precio_total_unidad = $precioTotal;
      $presupuesto->precio_total = $precioTotal * $presupuesto->unidades;

      $presupuesto->save();

    }
}
