<?php

namespace App\Http\Controllers;

use App\Obra;
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
    public function create()
    {
        //
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
     * @param  \App\Obra  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show(Obra $proveedor)
    {
        //
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
    public function update(Request $request, Obra $proveedor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Obra  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Obra $proveedor)
    {
        //
    }
}
