<?php

namespace App\Http\Controllers;

use App\Presupuesto;
use Illuminate\Http\Request;
use View;
use Illuminate\Support\Facades\DB;

class PresupuestoController extends Controller
{

  /**
  * Recalcula el precio final del presupuesto y lo actualiza en la ddbb
  *
  * @return Integer precio final
  */
  public function refreshTotalPrize(int $presupuesto_id){

    // $prize = 0;
    //
    // $partes = Presupuesto::find($presupuesto_id)->partes();
    //
    // $prize += $partes->each(function($parte) use ($prize){
    //   echo 'Parte: '. $parte->id;
    //   $precio = $parte->materiales()->each(function($material) use($parte, $prize){
    //     echo ' - Material: '. $material->id . '; Parte: '.$parte->id;
    //     $proveedor_id = DB::table('material_parte')->where('material_id', $material->id)->where('parte_id', $parte->id)->value('proveedor_id');
    //     echo ' - Proveedor elegido: '.$proveedor_id;
    //     $prize = DB::table('material_proveedor')->where('material_id', $material->id)->where('proveedor_id', $proveedor_id)->value('precio');
    //     echo ' - Precio: '.$prize;
    //     return $prize;
    //   });
    //   echo ' - PrecioFuera: '.$precio;
    //   echo ' || ';
    //   return $precio;
    // });

    $prizes = DB::select(DB::raw("SELECT partes.id, material_parte.*, material_proveedor.precio
    FROM material_proveedor, material_parte, partes
    WHERE material_proveedor.material_id = material_parte.material_id
    AND partes.presupuesto_id = 1
    AND material_parte.parte_id = partes.id
    AND material_proveedor.proveedor_id = material_parte.proveedor_id
    AND material_proveedor.material_id = material_parte.material_id"));

    $precioTotal = 0;

    foreach($prizes as $key => $value){
      $precioTotal += $value->precio;
    }

    return $this->updatePrize($precioTotal, $presupuesto_id);
  }

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
        //
         $presupuesto = Presupuesto::create($request->all());
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
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Presupuesto  $presupuesto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Presupuesto $presupuesto_id)
    {
      // $presupuesto = Presupuesto::find($presupuesto_id)->update($request->all());
      dd($request);
      return response()->json($presupuesto);
    }

    public function updatePrize(int $precio, $presupuesto_id)
    {
      $presupuesto = Presupuesto::find($presupuesto_id);

      $presupuesto->precio_final = $precio;

      $presupuesto->save();

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
