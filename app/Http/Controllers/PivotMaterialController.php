<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Presupuesto;
use Illuminate\Support\Facades\DB;
use App\Events\PresupuestoModificado;
use App\Events\MaterialParteModificado;

/*
  This controller with manage MaterialParte & MaterialProveedor & Presupuesto Prize
*/

class PivotMaterialController extends Controller
{

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

        event(new MaterialParteModificado($request->input('material_id'), $request->input('parte_id')));

        $presupuesto_id = DB::table('partes')
        ->select('presupuesto_id')
        ->where('id', '=', $request->input('parte_id'))
        ->first();

        $presupuesto = Presupuesto::find($presupuesto_id->presupuesto_id);

        event(new PresupuestoModificado($presupuesto));

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

        event(new MaterialParteModificado($material, $parte_id));

        $presupuesto_id = DB::table('partes')
        ->select('presupuesto_id')
        ->where('id', '=', $parte_id)
        ->first();

        $presupuesto = Presupuesto::find($presupuesto_id->presupuesto_id);

        event(new PresupuestoModificado($presupuesto));

        return response()->json($update);
    }

    /**
     * Borramos una fila de Material_Parte
     *
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroyWithParte(Request $request, $presupuesto_id)
    {
      //MaterialParte_ID
      $id = $request->input('id');

      $delete = DB::table('material_parte')
      ->where('id', $id)
      ->delete();

      $presupuesto = Presupuesto::find($presupuesto_id);

      event(new PresupuestoModificado($presupuesto));

      return response()->json($delete);
    }
}
