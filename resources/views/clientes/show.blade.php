@extends('layouts.app')

@section('title', 'Cliente')

@section('content')

<div class="pt-5" id="clienteContainer">
  <h1>Cliente Determinado</h1>
  <div class="row mt-5 p-3 border">
    <div class="col-xs-12">
      <p>Nombre: {{ $cliente->nombre }}</p>
      <p>Direccion: {{ $cliente->direccion }}</p>
      <p>Provincia: {{ $cliente->provincia }}</p>
      <p>Telefono: {{ $cliente->telefono }}</p>
      <p>ID cliente: {{ $cliente-> id}}</p>
    </div>
  </div>
  
  
</div>



@endsection
