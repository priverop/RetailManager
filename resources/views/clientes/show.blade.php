@extends('layouts.app')

@section('title', 'Cliente')

@section('content')
<?php $location = 'clientes' ?>

<div class="row">
  <div class="col">
    <h2>Información del Cliente</h2>
    <h1>{{ $cliente->nombre }}</h1>

    <table class="table mb-0">
      <tr>
        <th>ID</th>
        <td>{{ $cliente-> id}}</td>
        <th>NIF</th>
        <td>{{ $cliente->nif }}</td>
        <th>Dirección</th>
        <td>{{ $cliente->direccion }}</td>
      </tr>
      <tr>
        <th>Provincia</th>
        <td>{{ $cliente->provincia }}</td>
        <th>CP</th>
        <td>{{ $cliente->cp }}</td>
        <th>Teléfono</th>
        <td>{{ $cliente->telefono }} </td>

      </tr>
    </table>

  </div>

</div>
</br>

<h2>Obras</h2>

<div class="mt-3 p-3 mb-3 border">

  <div class="border p-3">
    <div class="col-xs-12">

      <table id="index">
        <thead>
          <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Versión</th>
            <th>Versión Activa</th>
            <th>Fecha</th>
            <th>Total Comercial</th>
          </tr>
        </thead>
        <tbody>
          @foreach($cliente->obras as $key => $value)
          <tr>
              <td>{{ $value->id }}</td>
              <td><a href="{{ route('obras.show', ['id' => $value->id]) }}">{{ $value->nombre }}</a></td>
              <td>{{ $value->version }} de {{ $value->v_ultima }}</td>
              @if($value->v_activa == 1)
                <td>Activa</td>
              @else
                <td>No Activa</td>
              @endif
              <td>{{ $value->fecha }}</td>
              <td>{{ $value->total_comercial}} €</td>
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
