<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;
use View;
use Response;

class ClienteController extends Controller
{
    protected $rules =
    [
        'nombre' => 'required|min:2|max:32|regex:/^[a-z ,.\'-]+$/i',
        'direccion' => 'required|min:2|max:128|regex:/^[a-z ,.\'-]+$/i',
        'provincia'=>'required|min:2|max:128|regex:/^[a-z ,.\'-]+$/i',
        'telefono'=>'required|min:2|max:128|regex:/^[a-z ,.\'-]+$/i'
    ];
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $clientes = Cliente::all();

      return View::make('clientes.index')->with('clientes', $clientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cliente = Cliente::all();
        return View::make('clientes.create')->with('clientes', $cliente);
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
        
       
        
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $material
     * @return \Illuminate\Http\Response
     */
    public function show(int $material)
    {
        //
        
        $cliente = Cliente::find($material);

        return View::make('clientes.show')->with('cliente', $cliente);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $material
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $material)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $material)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $material)
    {
        //
    }
}
