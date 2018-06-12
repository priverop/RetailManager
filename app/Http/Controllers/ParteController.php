<?php

namespace App\Http\Controllers;


use App\Parte;
use Illuminate\Http\Request;
use View;

class ParteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partes = Parte::all();

        return View::make('partes.index')->with('partes', $partes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $parte = Parte::create($request->all());
        return response()->json($parte);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Parte  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $parte = Parte::find($id)->delete();

      return response()->json($parte);
    }
}
