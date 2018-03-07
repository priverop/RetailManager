@extends('layouts.app')

@section('title', 'Material')

@section('content')

<div class="pt-5" id="clienteContainer">
  <h1>Proveedor Determinado</h1>
  <div class="row mt-5 p-3 border">
    <div class="col-xs-12">
    <p>{{ $proveedor->nombre }} </p>
   <p> {{ $proveedor->direccion }}</p>
   <p> {{ $proveedor->provincia }}</p>
   <p> {{ $proveedor->telefono }} </p>
   <p> {{ $proveedor->nif }}</p>
      
    </div>
  </div>
  
  
</div>



@endsection
