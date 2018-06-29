@extends('layouts.app')

@section('title', 'Material')

@section('content')
<?php $location = 'proveedores' ?>

<div class="pt-5" id="clienteContainer">
  <h1>{{ $proveedor->nombre }}</h1>
  <div class="row mt-5 p-3 border">
    <div class="col-xs-12">
    <p><b>ID:</b> {{ $proveedor->id }}</p>
    <p><b>Nombre:</b> {{ $proveedor->nombre }} </p>
    <p><b>Dirección:</b> {{ $proveedor->direccion }}</p>
    <p><b>Provincia:</b> {{ $proveedor->provincia }}</p>
    <p><b>Teléfono:</b> {{ $proveedor->telefono }} </p>
    <p><b>Nif:</b> {{ $proveedor->nif }}</p>

    </div>
  </div>


</div>



@endsection
