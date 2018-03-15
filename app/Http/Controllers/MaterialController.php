<?php

namespace App\Http\Controllers;

use App\Material;
use Illuminate\Http\Request;
use View;
use Illuminate\Support\Facades\DB;

class MaterialController extends Controller
{

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $materiales = Material::all();

      return View::make('materiales.index')->with('materiales', $materiales);
    }

    /**
     * Muestra la tabla Materiales-Proveedores (con precio)
     *
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $material = Material::all();
        return View::make('materiales.create')->with('materiales', $material);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $material = Material::create($request->all());
      $this->refreshAllPropierties();
      return response()->json($material);
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

      return response()->json($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show(int $material)
    {
        //
        $material = Material::find($material);

        return View::make('materiales.show')->with('material', $material);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit(Material $material)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Material $material)
    {
        //
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

        return response()->json($update);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

         Material::find($id)->delete();

        return response()->json(['done']);
    }
}
