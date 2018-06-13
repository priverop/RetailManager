<?php

namespace App\Http\Controllers;

use App\MaterialExterno;
use App\Presupuesto;
use Illuminate\Http\Request;

use App\Events\PresupuestoModificado;
use App\Events\MaterialParteModificado;

class MaterialExternoController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $material_externo = MaterialExterno::create([
        'concepto' => $request->input('concepto'),
        'presupuesto_id' => $request->input('presupuesto_id')
      ]);

      return response()->json($material_externo);
  }

  public function editarExterno(Request $request, $material)
  {
    $material_externo = MaterialExterno::find($material);

    $material_externo->update($request->all());

    $material_externo = MaterialExterno::find($material);
    $material_externo->m = ($material_externo->largo / 1000);
    $material_externo->m2 = ($material_externo->largo / 1000) * ($material_externo->alto / 1000);
    $material_externo->m3 = ($material_externo->largo / 1000) * ($material_externo->alto / 1000) * ($material_externo->ancho / 1000);

    $material_externo->total_m = $material_externo->m * $material_externo->unidades;
    $material_externo->total_m2 = $material_externo->m2 * $material_externo->unidades;
    $material_externo->total_m3 = $material_externo->m3 * $material_externo->unidades;


    if($material_externo->unidad == 'm'){
      $material_externo->precio_total = $material_externo->precio_unidad * $material_externo->total_m;
    }else if($material_externo->unidad == 'm2'){
      $material_externo->precio_total = $material_externo->precio_unidad * $material_externo->total_m2;
    }else if($material_externo->unidad == 'm3'){
      $material_externo->precio_total = $material_externo->precio_unidad * $material_externo->total_m3;
    }else{
      $material_externo->precio_total = $material_externo->precio_unidad * $material_externo->unidades;
    }

    $material_externo->save();

    $presupuesto = Presupuesto::find($request->input('presupuesto_id'));

    event(new PresupuestoModificado($presupuesto));

    return response()->json($material_externo);
  }

  public function destroyExterno(Request $request, $material)
  {
    $presupuesto_id = $request->input('presupuesto_id');
    \Debugbar::info($material);

    MaterialExterno::find($material)->delete();

    $presupuesto = Presupuesto::find($presupuesto_id);

    event(new PresupuestoModificado($presupuesto));

    return response()->json(['done']);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\MaterialExterno  $plano
   * @return \Illuminate\Http\Response
   */
  public function show(MaterialExterno $material_externo)
  {
      //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\MaterialExterno  $plano
   * @return \Illuminate\Http\Response
   */
  public function destroy(MaterialExterno $material_externo)
  {
      //
  }
}
