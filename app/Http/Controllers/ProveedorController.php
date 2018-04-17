<?php

namespace App\Http\Controllers;

use App\Proveedor;
use Illuminate\Http\Request;
use View;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores = Proveedor::all();

        return View::make('proveedores.index')->with('proveedores', $proveedores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $proveedor = Proveedor::find($request->input('id'));

      $html = view('proveedores.create', [
        'proveedor' => $proveedor,
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
         $proveedor = Proveedor::create($request->all());
         return response()->json($proveedor);
     }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show(int $indice)
    {
        //
        $proveedor = Proveedor::find($indice);




        return View::make('proveedores.show')->with('proveedor', $proveedor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function edit(Proveedor $proveedor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $edit = Proveedor::find($id)->update($request->all());

        return response()->json($edit);
    }
    public function destroy($id)
    {

         Proveedor::find($id)->delete();

        return response()->json(['done']);
    }
}
