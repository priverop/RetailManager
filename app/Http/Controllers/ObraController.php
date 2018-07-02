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
   * Formulario para duplicar obra
   *
   * @param  \App\Presupuesto $obra
   * @return \Illuminate\Http\Response
   */
  public function duplicateForm(Request $request)
  {
    $html = View::make('obras.duplicate')->with('obra_id', $request->input('obra_id'))->render();

    return response()->json($html);
  }

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

     if($request->input('v_nueva') !== NULL ){
       $nuevaObra->v_activa = 0;
       $nuevaObra->version = $obra->v_ultima + 1;
       $nuevaObra->v_ultima = $obra->v_ultima + 1;
       $update = DB::table('obras')
                     ->where('v_id', $obra->v_id)
                     ->update(['v_ultima' => $obra->v_ultima + 1]);
       $nuevaObra->v_id = $obra->v_id;
       $nuevaObra->push();
     }else{
       $nuevaObra->nombre = $request->input('concepto');

       $nuevaObra->version = 1;
       $nuevaObra->v_ultima = 1;
       $nuevaObra->v_activa = 1;
       $nuevaObra->push();

       $nuevaObra->v_id = $nuevaObra->id;
       $nuevaObra->save();
     }

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
          'v_activa'    => 1,
          'v_ultima'    => 1,
          // 'beneficio'   => $request->input('beneficio'),
          'coste_montaje' => $request->input('coste_montaje'),
          'porcentaje_montaje' => $request->input('porcentaje_montaje'),
          'coste_transporte' => $request->input('coste_transporte'),
          'porcentaje_transporte' => $request->input('porcentaje_transporte'),
          'margen_estructural' => $request->input('margen_estructural'),
          'margen_comercial' => $request->input('margen_comercial'),
          'cliente_id'  => $cliente->id
        ]);

        $obra->v_id = $obra->id;
        $obra->version = 1;
        $obra->save();
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
        $versiones = Obra::where('v_id', $obra->v_id)->get();

        return View::make('obras.show')->with('obra', [$obra, $versiones]);
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
        $cliente = Cliente::where('nombre', '=', $request->input('cliente'))->first();
        $obra = Obra::find($request->input('id'));


        if($request->input('select_v_activa') == NULL){
          $v_activa = 0;
        }else{
          $v_activa = 1;
          if($obra->v_activa == 0){
            $update = DB::table('obras')
            ->where('v_id', $obra->v_id)
            ->update(['v_activa' => 0]);
          }
        }

        $obra->update([
          'nombre'      => $request->input('nombre'),
          'fecha'       => $request->input('fecha'),
          // 'beneficio'   => $request->input('beneficio'),
          'coste_montaje' => $request->input('coste_montaje'),
          'porcentaje_montaje' => $request->input('porcentaje_montaje'),
          'coste_transporte' => $request->input('coste_transporte'),
          'porcentaje_transporte' => $request->input('porcentaje_transporte'),
          'margen_estructural' => $request->input('margen_estructural'),
          'margen_comercial' => $request->input('margen_comercial'),
          'cliente_id'  => $cliente->id
        ]);

        $totalPrize = 0;
        $totalPrizeIVA = 0;
        $obra->v_activa = $v_activa;
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
