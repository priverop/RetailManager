<?php

namespace App\Http\Controllers;

use App\Presupuesto;
use Illuminate\Http\Request;
use View;
use Illuminate\Support\Facades\DB;

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
        //

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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Presupuesto  $presupuesto
     * @return \Illuminate\Http\Response
     */
    public function edit(Presupuesto $presupuesto)
    {
        //
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

      $presupuesto->precio_total = $presupuesto->precio_total_unidad * $presupuesto->unidades;
      $presupuesto->save();

      $presupuesto->update($request->all());

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
