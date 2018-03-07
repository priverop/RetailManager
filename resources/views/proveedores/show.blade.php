@extends('layouts.app')

@section('title', 'Material')

@section('content')

<div class="pt-5" id="clienteContainer">
  <h1>Proveedor Determinado</h1>
  <div class="row mt-5 p-3 border">
    <div class="col-xs-12">
    <p>Nombre: {{ $proveedor->nombre }} </p>
    <p>Dirección: {{ $proveedor->direccion }}</p>
    <p>Provincia:{{ $proveedor->provincia }}</p>
    <p>Teléfono: {{ $proveedor->telefono }} </p>
    <p>Nif: {{ $proveedor->nif }}</p>
    <p>Id: {{ $proveedor->id }}</p>
      
    </div>
  </div>
  
  
</div>



@endsection
