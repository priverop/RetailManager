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
     * Devuelve la ventana modal para añadir Presupuestos Existentes
     *
     * @return \Illuminate\Http\Response
     */
    public function createExist($obra_id)
    {
      $presupuestos = Presupuesto::all();

      $html = view('presupuestos.create-exist', ['presupuestos' => $presupuestos, 'obra_id' => $obra_id])->render();

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
        $presupuesto = Presupuesto::create([
          'concepto' => $request->input('concepto'),
          'beneficio' => $request->input('beneficio'),
          'uso_beneficio_global' => $request->input('uso_beneficio_global'),
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
    public function duplicate($presupuesto_id, $obra_id = null, Request $request = null)
    {
      $presupuesto = Presupuesto::find($presupuesto_id);

      $nuevoPresupuesto = $presupuesto->replicate();
      if($request){
          $nuevoPresupuesto->concepto = $request->input('concepto');
      }
      if($obra_id != null){
        $nuevoPresupuesto->obra_id = $obra_id;
      }
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

      if($obra_id != null){
        return response()->json(route('presupuestos.show', ['id' => $nuevoPresupuesto->id]));
      }
      else{
        return response()->json('done');
      }

    }

    /**
     * Duplicar presupuestos a una obra concreta
     *
     * @param  \App\Presupuesto  $presupuesto
     * @return \Illuminate\Http\Response
     */
    public function duplicateToObra(Request $request, $obra_id){
      $muebles = $request->input('muebles');

      foreach ($muebles as $key => $value) {
        $this->duplicate($value, $obra_id);
      }
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

      $presupuesto->total_seccionadora = $presupuesto->t_seccionadora * $presupuesto->precio_t_seccionadora;
      $presupuesto->total_seccionadora = $presupuesto->t_seccionadora * $presupuesto->precio_t_seccionadora;
      $presupuesto->total_elaboracion = $presupuesto->t_elaboracion * $presupuesto->precio_t_elaboracion;
      $presupuesto->total_escuadradora = $presupuesto->t_escuadradora * $presupuesto->precio_t_escuadradora;
      $presupuesto->total_canteadora = $presupuesto->t_canteadora * $presupuesto->precio_t_canteadora;
      $presupuesto->total_punto = $presupuesto->t_punto * $presupuesto->precio_t_punto;
      $presupuesto->total_prensa = $presupuesto->t_prensa * $presupuesto->precio_t_prensa;

      $presupuesto->total_maquinas = ($presupuesto->maquinas_operarios * $presupuesto->maquinas_horas_operario) * $presupuesto->maquinas_precio_unidad;
      $presupuesto->total_bancos = ($presupuesto->bancos_operarios * $presupuesto->bancos_horas_operario) * $presupuesto->bancos_precio_unidad;
      $presupuesto->total_maquinas_oficial_1 = ($presupuesto->maquinas_oficial_1_operarios * $presupuesto->maquinas_oficial_1_horas_operario) * $presupuesto->maquinas_oficial_1_precio_unidad;
      $presupuesto->total_producto_ter_1 = ($presupuesto->producto_ter_1_operarios * $presupuesto->producto_ter_1_horas_operario) * $presupuesto->producto_ter_1_precio_unidad;
      $presupuesto->total_productor_ter_2 = ($presupuesto->productor_ter_2_operarios * $presupuesto->productor_ter_2_horas_operario) * $presupuesto->productor_ter_2_precio_unidad;
      $presupuesto->total_oficial_1 = ($presupuesto->oficial_1_operarios * $presupuesto->oficial_1_horas_operario) * $presupuesto->oficial_1_precio_unidad;
      $presupuesto->total_oficial_2 = ($presupuesto->oficial_2_operarios * $presupuesto->oficial_2_horas_operario) * $presupuesto->oficial_2_precio_unidad;
      $presupuesto->total_ayudante = ($presupuesto->ayudante_operarios * $presupuesto->ayudante_horas_operario) * $presupuesto->ayudante_precio_unidad;

      $presupuesto->save();

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
