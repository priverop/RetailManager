@extends('layouts.app')

@section('title', 'Material')

@section('content')

<div class="pt-5" id="clienteContainer">
  <h1>Material Determinado</h1>
  <div class="row mt-5 p-3 border">
    <div class="col-xs-12">
      <p>Nombre: {{ $material->nombre }}</p>
      <p>Precio: {{ $material->precio }}</p>
      <p>Proveedor id: {{ $material->proveedor_id }}</p>
      <p>Proveedor: {{ $material->proveedor->nombre }}</p> 
      <p>Material id: {{ $material->id}}</p>
      
    </div>
  </div>
  
  
</div>



@endsection
