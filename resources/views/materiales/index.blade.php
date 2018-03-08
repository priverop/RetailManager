@extends('layouts.app')

@section('title', 'Materiales')

@section('content')
<div class="container">
  <h2>Lista de Materiales</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Proveedores</th>
      </tr>
    </thead>
    <tbody>
      @foreach($materiales as $key => $value)
        <tr>
        <td> <a href='materiales/{{ $value->id }}'> {{ $value->nombre }}</a> </td>
        <td>{{ $value->precio }}</td>
        <td>
          @foreach($value->proveedores as $pkey => $pvalue)
            {{ $pvalue->nombre }} -
          @endforeach
        </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
