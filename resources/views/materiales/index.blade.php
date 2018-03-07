@extends('layouts.app')

@section('title', 'Materiales')

@section('content')
  @foreach($materiales as $key => $value)
    Nombre: {{ $value->nombre }} <br /><br />
    Precio: {{ $value->precio }} <br /><br />
    Proveedor: {{ $value->proveedor->nombre }} <br /><br />
    
<input type="button" value="Mostrar Material" onClick="window.location = 'materiales/{{ $value->id }}'"> 
<hr />

  @endforeach

@endsection
