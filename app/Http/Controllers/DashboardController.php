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

}
