<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Presupuesto;
use Illuminate\Support\Facades\DB;

/*
  This controller with manage MaterialParte & MaterialProveedor & Presupuesto Prize
*/

class PivotMaterialController extends Controller
{

  public function updatePrize($precio, $presupuesto_id)
  {
    $presupuesto = Presupuesto::find($presupuesto_id);

    $presupuesto->precio_final = $precio;

    $presupuesto->save();

    return response()->json($presupuesto);
  }

  /**
  * Recalcula el precio final del presupuesto y lo actualiza en la ddbb
  *
  * @return Integer precio final
  */
  public function refreshTotalPrize($presupuesto_id){

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

    $update = $this->updatePrize($precioTotal, $presupuesto_id);

    return response()->json($update);
  }

  /**
   * Actualizamos las propiedades de todos los materiales
   *
   * @param integer $materialID
   * @param integer $parteID
   * @return \Illuminate\Http\Response
   */

  public function refreshAllPropierties(){
    $rows = DB::table('material_parte')->get();

    foreach ($rows as $key => $value) {

      $m2 = $value->ancho * $value->alto / 1000000;

      $precio = DB::table('material_proveedor')
      ->where('material_id', $value->material_id)
      ->where('proveedor_id', $value->proveedor_id)
      ->select('precio')->get();

      $update = DB::table('material_parte')
      ->where('material_id', $value->material_id)
      ->where('parte_id', $value->parte_id)
      ->update(
        ['m2' => $m2,
        'total_m2' => $m2 * $value->unidades,
        'precio_total' => $precio[0]->precio * $value->unidades]
      );
    }

    return response()->json($update);
  }

    /**
     * Muestra la tabla Materiales-Proveedores (con precio)
     *
     * @param String tipo de material
     * @return \Illuminate\Http\Response
     */
    public function indexMaterialesProveedores($tipo)
    {
      $materialesProveedoresPrecio = DB::table('material_proveedor')
      ->join('materials', 'material_proveedor.material_id', '=', 'materials.id')
      ->join('proveedors', 'material_proveedor.proveedor_id', '=', 'proveedors.id')
      ->select('material_proveedor.*', 'materials.nombre as m_nombre', 'proveedors.nombre as p_nombre', 'materials.tipo as m_tipo')
      ->where('materials.tipo', '=', $tipo)
      ->get();

      return View::make('materiales.index-withProveedores')->with('pivotTable', $materialesProveedoresPrecio);
    }

    /**
     * Almacenamos un Material en la tabla Material_Parte
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeWithProveedor(Request $request)
    {
        $result = DB::table('material_parte')->insert(
          [
            'parte_id'      => $request->input('parte_id'),
            'material_id'   => $request->input('material_id'),
            'proveedor_id'  => $request->input('proveedor_id'),
          ]
        );

        $this->refreshAllPropierties();

        $presupuesto_id = DB::table('partes')
        ->select('presupuesto_id')
        ->where('id', '=', $request->input('parte_id'))
        ->get();

        $this->refreshTotalPrize($presupuesto_id->first()->presupuesto_id);

      return response()->json($result);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  integer $material
     * @return \Illuminate\Http\Response
     */
    public function updateWithParte(Request $request, $material)
    {

        $parte_id = $request->input('parte');

        $update = DB::table('material_parte')
        ->where('material_id', $material)
        ->where('parte_id', $parte_id)
        ->update(
          ['unidades' => $request->input('unidades'),
          'ancho' => $request->input('ancho'),
          'alto' => $request->input('alto')]
        );

        $this->refreshAllPropierties();

        $presupuesto_id = DB::table('partes')
        ->select('presupuesto_id')
        ->where('id', '=', $parte_id)
        ->get();

        $this->refreshTotalPrize($presupuesto_id->first()->presupuesto_id);

        return response()->json($update);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroyWithParte(Request $request, $material)
    {
      $parte_id = $request->input('parte');

      $delete = DB::table('material_parte')
      ->where('material_id', $material)
      ->where('parte_id', $parte_id)
      ->delete();

      $presupuesto_id = DB::table('partes')
      ->select('presupuesto_id')
      ->where('id', '=', $parte_id)
      ->get();

      $this->refreshTotalPrize($presupuesto_id->first()->presupuesto_id);

        return response()->json($delete);
    }
}
