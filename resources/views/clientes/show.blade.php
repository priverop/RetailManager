@extends('layouts.app')

@section('title', 'Cliente')

@section('content')
<?php $location = 'clientes' ?>

<h1>{{ $cliente->nombre }}</h1>

<div class="row">

  <div class=" mt-5 mb-5 p-3 border">
    <div class="col-xs-12">

      <p><b>ID:</b> {{ $cliente-> id}}</p>
      <p><b>Nombre:</b> {{ $cliente->nombre }}</p>
      <p><b>Direccion:</b> {{ $cliente->direccion }}</p>
      <p><b>Provincia:</b> {{ $cliente->provincia }}</p>
      <p><b>Telefono:</b> {{ $cliente->telefono }}</p>

    </div>
  </div>

</div>

<h2>Obras</h2>

<div class="row mt-5">

  <div class="border p-3">
    <div class="col-xs-12">

      <table id="index">
        <thead>
          <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Fecha</th>
            <th>Cliente</th>
            <th>Precio Coste</th>
            <th>Beneficio</th>
            <th>Precio Total</th>
          </tr>
        </thead>
        <tbody>
          @foreach($cliente->obras as $key => $value)
          <tr>
              <td>{{ $value->id }}</td>
              <td><a href="{{ route('obras.show', ['id' => $value->id]) }}">{{ $value->nombre }}</a></td>
              <td>{{ $value->fecha }}</td>
              <td>{{ $value->cliente->nombre }}</td>
              <td>{{ $value->precio_total}}</td>
              <td>{{ $value->beneficio }}%</td>
              <td>{{ $value->precio_total_beneficio}}</td>
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
