<?php

namespace App\Http\Controllers;

use App\Obra;
use App\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Events\PresupuestoModificado;

use View;

class ObraController extends Controller
{

  /**
   * Duplicar obra y todo su contenido.
   *
   * @return \Illuminate\Http\Response
   */
   public function duplicate(Request $request, $obra_id)
   {
     // Encontramos la obra a duplicar
     $obra = Obra::find($obra_id);

     $nuevaObra = $obra->replicate();
     $nuevaObra->nombre = $nuevaObra->nombre . ' Copia';
     $nuevaObra->push();

     foreach ($obra->presupuestos as $key => $presupuesto) {

       // Duplicamos el presupuesto y le ponemos la obra nueva
       $nuevoPresupuesto = $presupuesto->replicate();
       $nuevoPresupuesto->obra_id = $nuevaObra->id;
       $nuevoPresupuesto->push();

       // Duplicamos materiales_externos
       foreach ($presupuesto->material_externos as $key => $mexterno) {
         $nuevoMaterialExterno = $mexterno->replicate();
         $nuevoMaterialExterno->presupuesto_id = $nuevoPresupuesto->id;
         $nuevoMaterialExterno->push();
       }
       // Duplicamos planos
       foreach ($presupuesto->planos as $key => $plano) {
         $nuevoPlano = $plano->replicate();
         $nuevoPlano->presupuesto_id = $nuevoPresupuesto->id;
         $nuevoPlano->push();
       }
       // Duplicamos partes y sus materiales
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
         } // Foreach materialespartes
       } // Foreach partes
     } // Foreach presupuestos

     return response()->json(route('obras.show', ['id' => $nuevaObra->id]));
   }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obras = Obra::all();

        return View::make('obras.index')->with('obras', $obras);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $obra = Obra::find($request->input('id'));

      $html = view('obras.create', [
        'obra' => $obra,
      ])->render();

      return response()->json($html);
    }

    public function createInfHoras($id)
    {
      $obra = Obra::find($id);

      $html = view('obras.informe-horas', [
        'obra' => $obra,
      ])->render();

      return response()->json($html);
    }

    public function createInfCompras($id)
    {
      $obra = Obra::find($id);

      $html = view('obras.informe-compras', [
        'obra' => $obra,
      ])->render();

      return response()->json($html);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente = Cliente::where('nombre', '=', $request->input('cliente'))->first();

        $obra = Obra::create([
          'nombre'      => $request->input('nombre'),
          'fecha'       => $request->input('fecha'),
          'beneficio'   => $request->input('beneficio'),
          'cliente_id'  => $cliente->id
        ]);

        return response()->json(route('obras.show', ['id' => $obra->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Obra  $obra
     * @return \Illuminate\Http\Response
     */
    public function show($obra)
    {
        $obra = Obra::find($obra);

        return View::make('obras.show')->with('obra', $obra);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Obra  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $cliente = Cliente::where('nombre', '=', $request->input('nombre'))->first();
        $obra = Obra::find($request->input('id'));
        $obra->update([
          'fecha' => $request->input('fecha'),
          'beneficio' => $request->input('beneficio'),
          'cliente_id' => $cliente->id
        ]);

        $totalPrizeB = 0;
        foreach($obra->presupuestos as $key => $value){
          if($value->uso_beneficio_global === 1){
            $beneficio = $obra->beneficio;
          }else{
            $beneficio = $value->beneficio;
          }
          $totalPrizeB += $value->precio_total * (1 + ($beneficio * 0.01));
        }

        $obra->precio_total_beneficio = $totalPrizeB;
        $obra->save();

        return response()->json($obra);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Obra  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Obra::find($id)->delete();
      return response()->json(['done']);
    }
}
