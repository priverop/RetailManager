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
     * Obtenemos el presupuesto que se ha modificado.
     * Seleccionamos todos los precios de los materiales_partes de todas las partes del presupuesto
     * Sumamos todo.
     * Actualizamos el precio_total_unidad del presupuesto.
     * Actualizamos el precio_total del presupuesto.
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

      foreach($presupuesto->material_externos as $key => $mvalue){
        $precioTotal += $mvalue->precio_total;
      }

      foreach($prizes as $key => $value){
        $precioTotal += $value->precio_total;
      }

      $precioTotal += $presupuesto->total_seccionadora;
      $precioTotal += $presupuesto->total_escuadradora;
      $precioTotal += $presupuesto->total_elaboracion;
      $precioTotal += $presupuesto->total_canteadora;
      $precioTotal += $presupuesto->total_punto;
      $precioTotal += $presupuesto->total_prensa;

      $precioTotal += $presupuesto->total_maquinas;
      $precioTotal += $presupuesto->total_bancos;
      $precioTotal += $presupuesto->total_maquinas_oficial_1;
      $precioTotal += $presupuesto->total_producto_ter_1;
      $precioTotal += $presupuesto->total_productor_ter_2;
      $precioTotal += $presupuesto->total_oficial_1;
      $precioTotal += $presupuesto->total_oficial_2;
      $precioTotal += $presupuesto->total_ayudante;

      $precioTotal += $presupuesto->total_desplazamiento;
      $precioTotal += $presupuesto->total_transporte;
      $precioTotal += $presupuesto->total_imprevistos;

      if($presupuesto->desperdicio > 0 ){
          $precioTotal = $precioTotal + $this->getDesperdicioTotal($presupuesto->desperdicio, $this->getMaderaPrecioTotal($presupuesto_id));
      }
      if($presupuesto->beneficio > 0 ){
          $precioTotal = $precioTotal * (1 + ($presupuesto->beneficio * 0.01) );
      }

      $presupuesto->precio_total_unidad = $precioTotal;
      $presupuesto->precio_total = $precioTotal * $presupuesto->unidades;

      $presupuesto->save();

    }

    /**
     * Devolvemos el precio total de las maderas de un presupuesto.
     *
     * @param int $presupuesto_id
     * @return int
     */
    private function getMaderaPrecioTotal(int $presupuesto_id){
      $prizes = DB::table("material_parte")
      ->select('precio_total')
      ->join('partes', function($join) use ($presupuesto_id){
        $join->on('material_parte.parte_id', '=', 'partes.id')
        ->where('partes.presupuesto_id', '=', $presupuesto_id);
      })
      ->join('materials', function($join){
        $join->on('material_parte.material_id', '=', 'materials.id')
        ->where('materials.tipo', '=', 'madera');
      })
      ->get();

      $sumaMadera = 0;
      foreach ($prizes as $key => $value) {
        $sumaMadera += $value->precio_total;
      }
      return $sumaMadera;
    }

    /**
     * Devolvemos el desperdicio total
     *
     * @param int $desperdicio
     * @param int $precioMaderaTotal
     * @return int
     */

    private function getDesperdicioTotal(int $desperdicio, int $precioMaderaTotal){
      return $desperdicio * $precioMaderaTotal / 100;
    }

}
