<?php

namespace App\Http\Controllers;

use App\Plano;
use Illuminate\Http\Request;

class PlanoController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Almacenamos la foto
        foreach ($request->img as $key => $value) {
          $path = $value->store('public/planos');
          Plano::create([
            'presupuesto_id' => $request->input('presupuesto_id'),
            'filename' => $path
          ]);
        }

        return redirect('presupuestos/'.$request->input('presupuesto_id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plano  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Plano::find($id)->delete();

        return response()->json(['done']);
    }

}
