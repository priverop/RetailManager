<?php

namespace App\Listeners;

use App\Events\ObraModificada;
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
    public function handle(ObraModificada $event)
    {
        $obra = $event->obra;

        $sumaPresupuestosTotal = 0;
        $sumaPresupuestosConIva = 0;

        foreach($obra->presupuestos as $key => $value){
          $sumaPresupuestosTotal += $value->precio_total;
          $sumaPresupuestosConIva += $value->precio_con_iva;
        }

        $obra->precio_total = $sumaPresupuestosTotal;
        $obra->total_IVA = $sumaPresupuestosConIva;

        // Coste base será el coste de presupuestos + Total Montaje + Total Transporte
        $costeBase = $sumaPresupuestosConIva;

        // MONTAJE //
        if($obra->coste_montaje == 0){
          $obra->total_montaje = $obra->total_IVA * ($obra->porcentaje_montaje * 0.01);
        }else{
          $obra->total_montaje = $obra->coste_montaje;
        }
        $costeBase += $obra->total_montaje;

        // TRANSPORTE //
        if($obra->coste_transporte == 0){
          $obra->total_transporte = $obra->total_IVA * ($obra->porcentaje_transporte * 0.01);
        }else{
          $obra->total_transporte = $obra->coste_transporte;
        }
        $costeBase += $obra->total_transporte;

        $obra->coste_base = $sumaPresupuestosConIva;

        // MARGEN ESTRUCTURAL //
        if ($obra->margen_estructural > 0){
          $obra->total_estructural = $obra->coste_base / $obra->margen_estructural;
        }else{
          $obra->total_estructural = $obra->coste_base;
        }

        // MARGEN COMERCIAL //
        if ($obra->margen_comercial > 0){
          $obra->total_comercial = $obra->total_estructural / $obra->margen_comercial;
        }else{
          $obra->total_comercial = $obra->total_estructural;
        }

        $obra->save();

    }
}
