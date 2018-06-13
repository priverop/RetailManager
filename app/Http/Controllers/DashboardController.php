<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Proveedor;
use App\Obra;
use Illuminate\Http\Request;
use View;
use Response;

class DashboardController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $clientes = Cliente::all();
      $proveedores = Proveedor::all();
      $obras = Obra::all();

      return view('dashboard', [
        'clientes' => $clientes,
        'proveedores' => $proveedores,
        'obras' => $obras
      ]
      );
    }

    /**
     * Devolvemos el total presupuestado entre las fechas dadas
     *
     * @param date desde
     * @param date hasta
     * @return \Illuminate\Http\Response
     */
    public function totalPresupuestado(Request $request){
      $desde = \Carbon\Carbon::parse($request->input('desde'))->format('Y-m-d');
      $hasta = \Carbon\Carbon::parse($request->input('hasta'))->format('Y-m-d');

      $obras = Obra::whereDate('fecha', '<', $hasta)->whereDate('fecha', '>', $desde)->get();

      $precioTotal = 0;
      foreach ($obras as $key => $value) {
        $precioTotal += $value->precio_total_beneficio;
      }

      return $precioTotal;
    }

}
