@extends('layouts.app')

@section('title', 'Presupuestos')

@section('content')

  @foreach($presupuestos as $key => $value)
    Nombre: {{ $value->nombre }} <br /><br />
    Obra para el Cliente: {{ $value->obra->cliente->nombre }} <br /><br />
    <br /><br />
  @endforeach
@endsection
