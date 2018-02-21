<?php

namespace App\Http\Controllers;

use App\Presupuesto;
use Illuminate\Http\Request;
use View;

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
     * @param  \App\Presupuesto  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show(Presupuesto $proveedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Presupuesto  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function edit(Presupuesto $proveedor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Presupuesto  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Presupuesto $proveedor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Presupuesto  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Presupuesto $proveedor)
    {
        //
    }
}
