D.@extends('layouts.app')

@section('title', 'Proveedor Individual')

@section('content')
<?php $location = 'proveedores' ?>

<div class="row">
  <div class="col">
    <h2>Información de Proveedor</h2>
    <h1>{{ $proveedor->nombre }}</h1>

    <table class="table mb-0">
      <tr>
        <th>ID</th>
        <td>{{ $proveedor->id }}</td>
        <th>Nombre</th>
        <td>{{ $proveedor->nombre }} </td>
        <th>Dirección</th>
        <td>{{ $proveedor->direccion }}</td>
      </tr>
      <tr>
        <th>Provincia</th>
        <td>{{ $proveedor->provincia }}</td>
        <th>Teléfono</th>
        <td>{{ $proveedor->telefono }} </td>
        <th>NIF</th>
        <td>{{ $proveedor->nif }}</td>
      </tr>
    </table>

  </div>

</div>
</br>

<h2>Materiales</h2>

<div class="mt-3 p-3 mb-3 border">

  <div class="border p-3">
    <div class="col-xs-12">

      <table id="index">
        <thead>
          <tr>
            <th>#</th>
            <th>Material</th>
            <th>Tipo</th>
            <th>Unidad</th>
            <th>Descuento</th>
            <th>Cantidad mínima</th>
            <th>Precio Unidad</th>
          </tr>
        </thead>
        <tbody>
          @foreach($proveedor->materiales as $key => $value)
            <tr>
              <td>{{ $value->id }}</td>
              <td><a href="{{route('materiales.show', ['id' => $value->id])}}"> {{ $value->nombre}}</a> </td>
              <td>{{ $value->tipo}}</td>
              <td>{{ $value->pivot->unidad }}</td>
              <td>{{ $value->pivot->descuento }}</td>
              <td>{{ $value->pivot->min_unidades }}</td>
              <td>{{ $value->pivot->precio }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>

    </div>
  </div>
</div>

<script type="text/javascript">

$(function(){
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
$.fn.dataTable.moment('DD/MM/YYYY');

  $('#index').DataTable({
    "language": {
          "url": "{{ asset('/js/datatable_spanish.json') }}"
      }
  });

});


</script>

@endsection
