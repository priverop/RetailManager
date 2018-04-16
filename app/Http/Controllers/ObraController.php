<?php

namespace App\Http\Controllers;

use App\Obra;
use App\Cliente;
use Illuminate\Http\Request;

use View;

class ObraController extends Controller
{
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente = Cliente::where('nombre', '=', $request->input('nombre'))->first();
        $obra = Obra::create([
          'fecha' => $request->input('fecha'),
          'beneficio' => $request->input('beneficio'),
          'cliente_id' => $cliente->id
        ]);
        return response()->json($obra);
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Obra  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function edit(Obra $proveedor)
    {
        //
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
