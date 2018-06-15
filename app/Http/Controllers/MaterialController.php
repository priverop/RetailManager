<?php

namespace App\Http\Controllers;

use App\Material;
use App\Proveedor;
use Illuminate\Http\Request;
use View;
use Illuminate\Support\Facades\DB;

class MaterialController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $materialesProveedoresPrecio = DB::table('material_proveedor')
      ->join('materials', 'material_proveedor.material_id', '=', 'materials.id')
      ->join('proveedors', 'material_proveedor.proveedor_id', '=', 'proveedors.id')
      ->select('material_proveedor.*', 'materials.nombre as m_nombre', 'materials.tipo as m_tipo', 'proveedors.nombre as p_nombre', 'materials.tipo as m_tipo')
      ->get();

      return View::make('materiales.index')->with('pivotTable', $materialesProveedoresPrecio);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $proveedores = Proveedor::all();


      if($request->input('material_id') && $request->input('proveedor_id')){

        $material = Material::find($request->input('material_id'));
        $proveedor = Proveedor::find($request->input('proveedor_id'));
        $seleccion = DB::table('material_proveedor')
        ->where('material_id', $request->input('material_id'))
        ->where('proveedor_id', $request->input('proveedor_id'))
        ->select('precio', 'unidad', 'descuento', 'min_unidades')->first();

        $html = view('materiales.create', [
          'proveedores' => $proveedores,
          'material' => $material,
          'precio' => $seleccion->precio,
          'unidad' => $seleccion->unidad,
          'descuento' => $seleccion->descuento,
          'min_unidades' => $seleccion->min_unidades,
          'proveedor' => $proveedor,
          ])->render();
      }
      else{
        $html = view('materiales.create', [
          'proveedores' => $proveedores
          ])->render();
      }

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

      // Comprobamos que no exista
      if(!Material::where('nombre', '=', $request->input('nombre'))->exists()){
        $material = Material::create($request->all());
      }
      else{
        $material = Material::where('nombre', '=', $request->input('nombre'))->first();
      }

      //Lo insertamos en material_proveedor
      $result = DB::table('material_proveedor')->insert(
        [
          'material_id'   => $material->id,
          'proveedor_id'  => $request->input('proveedorID'),
          'precio'        => $request->input('precio'),
          'unidad'       => $request->input('unidad'),
          'descuento'       => $request->input('descuento'),
          'min_unidades'       => $request->input('min_unidades')
        ]
      );


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
    public function update(Request $request, $material)
    {

      $precio = str_replace(',', '.', $request->input('precio'));

        if($request->input('proveedorID')){

          $newProveedorID = $request->input('proveedorID');

          $update = DB::table('material_proveedor')
          ->where('material_id', $material)
          ->where('proveedor_id', $request->input('proveedor_id'))
          ->update(
            ['precio'       => $precio,
             'unidad'       => $request->input('unidad'),
             'descuento'       => $request->input('descuento'),
             'min_unidades'       => $request->input('min_unidades'),
             'proveedor_id' => $newProveedorID]
          );
        }
        else {

          $update = DB::table('material_proveedor')
          ->where('material_id', $material)
          ->where('proveedor_id', $request->input('proveedor_id'))
          ->update(
            ['precio' => $precio,
             'unidad'       => $request->input('unidad'),
             'descuento'       => $request->input('descuento'),
             'min_unidades'       => $request->input('min_unidades')]
          );

        }

        // Actualizamos el material
        $material = Material::find($material)->update($request->all());

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

        Material::find($id)->delete();

        return response()->json(['done']);
    }

}
