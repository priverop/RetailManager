@extends('layouts.app')

@section('title', 'Proveedores')

@section('content')
  @foreach($proveedores as $key => $value)
    {{ $value->nombre }} <br /><br />
    {{ $value->direccion }} <br /><br />
    {{ $value->provincia }} <br /><br />
    {{ $value->telefono }} <br /><br />
    {{ $value->nif }} <br /><br />
    <br /><br />
  @endforeach
@endsection
