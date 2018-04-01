<?php

namespace App\Listeners;

use App\Events\PresupuestoModificado;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\DB;
use App\Obra;

class RefreshTotalPrizeObra
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
     * Obtenemos el presupuesto que se ha modificado.
     * Obtenemos su obra.
     * Seleccionamos todos los presupuestos con ese obra_id
     * Sumamos todos los Prizes_total
     * Se guarda en prize_total de la obra
     *
     * @param  PresupuestoModificado  $event
     * @return void
     */
    public function handle(PresupuestoModificado $event)
    {
        $presupuesto = $event->presupuesto;

        $obra = Obra::find($presupuesto->obra_id);

        $totalPrize = 0;

        foreach($obra->presupuestos as $key => $value){
          $totalPrize += $value->precio_total;
        }

        $obra->precio_total = $totalPrize;
        $obra->save();

    }
}
