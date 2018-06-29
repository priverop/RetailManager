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
        $totalPrizeIVA = 0;

        foreach($obra->presupuestos as $key => $value){
          $totalPrize += $value->precio_total;
          $totalPrizeIVA += $value->precio_con_iva;
          // if($value->uso_beneficio_global === 1){
          //   $beneficio = $obra->beneficio;
          // }else{
          //   $beneficio = $value->beneficio;
          // }
          // $totalPrizeB += $value->precio_total * (1 + ($beneficio * 0.01));
        }

        $obra->precio_total = $totalPrize;
        $obra->precio_total_beneficio = $totalPrizeIVA;
        $obra->total_IVA = $totalPrizeIVA;

        if($obra->coste_montaje == 0){
          $obra->total_montaje = $obra->precio_total_beneficio * ($obra->porcentaje_montaje * 0.01);
        }else{
          $obra->total_montaje = $obra->coste_montaje;
        }
        $totalPrizeIVA += $obra->total_montaje;

        if($obra->coste_transporte == 0){
          $obra->total_transporte = $obra->precio_total_beneficio * ($obra->porcentaje_transporte * 0.01);
        }else{
          $obra->total_transporte = $obra->coste_transporte;
        }
        $totalPrizeIVA += $obra->total_transporte;

        $obra->precio_total_beneficio = $totalPrizeIVA;

        if ($obra->margen_estructural > 0){
          $obra->total_estructural = $obra->precio_total_beneficio / $obra->margen_estructural;
        }else{
          $obra->total_estructural = $obra->precio_total_beneficio;
        }

        if ($obra->margen_comercial > 0){
          $obra->total_comercial = $obra->total_estructural / $obra->margen_comercial;
        }else{
          $obra->total_comercial = $obra->total_estructural;
        }

        $obra->save();

    }
}
