@extends('layouts.app')

@section('title', 'Obra Individual')

@section('content')

<div class="pt-5" id="ObraContainer">
  <h1>Obra Individual</h1>
  <div class="row mt-5 p-3 border">
    <div class="col-xs-12">
      <p>id: {{ $proveedor->id }}</p>
      <p>Cliente id: {{ $proveedor->id }}</p>
      
    </div>
  </div>
  
  
</div>

@endsection

