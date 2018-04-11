<?php

namespace App\Http\Controllers;

use App\Presupuesto;
use Illuminate\Http\Request;
use View;
use Illuminate\Support\Facades\DB;

use App\Events\PresupuestoModificado;
use App\Events\MaterialParteModificado;

class PresupuestoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $presupuestos = Presupuesto::all();

        return View::make('presupuestos.index')->with('presupuestos', $presupuestos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('presupuestos.create')->with('presupuestos', $presupuestos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $presupuesto = Presupuesto::create([
          'concepto' => $request->input('concepto'),
          'beneficio' => $request->input('beneficio'),
          'obra_id' => $request->input('obra_id')
        ]);
        return response()->json($presupuesto);
    }

    /**
     * Display the specified resource.
     *
     * @param  integer  $presupuesto_id
     * @return \Illuminate\Http\Response
     */
    public function show(int $presupuesto_id)
    {
        $presupuesto = Presupuesto::find($presupuesto_id);

        return View::make('presupuestos.show')->with('presupuesto', $presupuesto);
    }


    /**
     * Duplicar presupuesto
     *
     * @param  \App\Presupuesto  $presupuesto
     * @return \Illuminate\Http\Response
     */
    public function duplicate(Request $request, $presupuesto_id)
    {
      $presupuesto = Presupuesto::find($presupuesto_id);

      $nuevoPresupuesto = $presupuesto->replicate();
      $nuevoPresupuesto->concepto = $request->input('concepto');
      $nuevoPresupuesto->push();

      foreach ($presupuesto->material_externos as $key => $mexterno) {
        $nuevoMaterialExterno = $mexterno->replicate();
        $nuevoMaterialExterno->presupuesto_id = $nuevoPresupuesto->id;
        $nuevoMaterialExterno->push();

      }
      foreach ($presupuesto->planos as $key => $plano) {
        $nuevoPlano = $plano->replicate();
        $nuevoPlano->presupuesto_id = $nuevoPresupuesto->id;
        $nuevoPlano->push();
      }
      foreach ($presupuesto->partes as $key => $parte) {
        $nuevaParte = $parte->replicate();
        $nuevaParte->presupuesto_id = $nuevoPresupuesto->id;
        $nuevaParte->push();
        
        foreach ($parte->materialespartes as $key => $mparte) {

          $result = DB::table('material_parte')->insert(
            [
              'parte_id'      => $nuevaParte->id,
              'material_id'   => $mparte->pivot->material_id,
              'proveedor_id'  => $mparte->pivot->proveedor_id,
              'unidades'      => $mparte->pivot->unidades,
              'ancho'         => $mparte->pivot->ancho,
              'alto'          => $mparte->pivot->alto,
              'm2'            => $mparte->pivot->m2,
              'total_m2'      => $mparte->pivot->total_m2,
              'precio_total'  => $mparte->pivot->precio_total
            ]
          );
        }
      }

      event(new PresupuestoModificado($nuevoPresupuesto));

      // return response()->json(route('presupuestos.show', ['id' => $nuevoPresupuesto->id]));
      return View::make('presupuestos.show')->with('presupuesto', $nuevoPresupuesto);
    }

    /**
     * Formulario para duplicar presupuesto
     *
     * @param  \App\Presupuesto  $presupuesto
     * @return \Illuminate\Http\Response
     */
    public function duplicateForm(Request $request)
    {
      $html = View::make('presupuestos.duplicate')->with('presupuesto_id', $request->input('presupuesto_id'))->render();

      return response()->json($html);
    }

    /**
     * Update the specified resource in storage.
     * Al actualizarse las unidades actualizamos el precio_total
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Presupuesto  $presupuesto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
      $presupuesto = Presupuesto::find($id);

      $presupuesto->update($request->all());
      $presupuesto = Presupuesto::find($id);

      event(new PresupuestoModificado($presupuesto));

      return response()->json($presupuesto);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Presupuesto  $presupuesto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Presupuesto::find($id)->delete();

     return response()->json(['done']);
    }
}
