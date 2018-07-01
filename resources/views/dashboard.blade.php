@extends('layouts.app')

@section('title', 'Panel Principal')

@section('content')

<?php $location = 'home' ?>

<div class="row">
  <div class="col">
    <h2>CÓMO EMPEZAR</h2>
    <p>
      A continuación una pequeña guía para crear un presupuesto.
    </p>
    <ol>
      <li>Entramos en <a href="{{ route('obras.index') }}">Obras</a>.</li>
      <li>Pulsamos en el botón rojo: "Obra Nueva".</li>
      <li>Rellenamos los datos para la obra. Pulsamos en el botón verde "Añadir".</li>
      <li>Nos llevará a la nueva obra. Pulsamos en el botón rojo: "Nuevo Mueble".</li>
      <li>Indicamos el concepto, Beneficio si queremos o activamos la casilla global para usar el que indicamos para la obra.</li>
      <li>Pulsamos en el botón verde "Añadir". Nos dirigirá al Presupuesto del Mueble nuevo, donde ya se puede presupuestar.</li>
    </ol>
  </div>

</div>

<div class="row mt-5">
  <div class="col border p-3">
    <h4>Clientes</h4>
    <p>{{count($clientes)}} clientes en cartera.</p>
    <a href="{{ route('clientes.index') }}"><button class="btn btn-primary">VER LISTA</button></a>
  </div>
  <div class="col border p-3">
    <h4>Proveedores</h4>
    <p>{{count($proveedores)}} proveedores añadidos.</p>
    <a href="{{ route('proveedores.index') }}"><button class="btn btn-primary">VER LISTA</button></a>
  </div>
  <div class="col border p-3">
    <h4>Obras</h4>
    <p>{{count($obras)}} obras presupuestadas.</p>
    <a href="{{ route('obras.index') }}"><button class="btn btn-primary">VER LISTA</button></a>
  </div>
</div>

<div class="row border  mt-5">
  <div class="row p-3">
    <div class="col-sm-8">
      <h4>Informe Total Presupuestado</h4>
      <p>Puede modificar las fechas y pulse en actualizar.</p>
      <div class="mt-5">
        <form id="informeForm">
          <div class="form-row">
            <div class="form-group">
              <label class="control-label col-sm-6" for="desde"><b>DESDE:</b></label>
              <div class="col-sm-10"><input type="date" name="desde" value="2000-01-01"></div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-6" for="hasta"><b>HASTA:</b></label>
              <div class="col-sm-10"><input type="date" name="hasta" value="2019-01-01"></div>
            </div>
              <div class="form-group fullfather">
                <div class="col-sm-12">
                  <input type="button" class="btn btn-primary" value="Actualizar" id="RefreshButton">
                </div>
              </div>
          </div>
        </form>
      </div>
    </div>
    <div class="col-sm-4 p-3">
      <h5>Total Presupuestado:</h5>
      <p id="totalPresupuestado">Cargando...</p>
    </div>
  </div>

  <div class="row p-3">
    <div class="col">
      <table id="indexObra">
        <thead>
          <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Fecha</th>
            <th>Cliente</th>
            <th>Precio Total</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>

<script>
$(function(){
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.fn.dataTable.moment('DD-MM-YYYY');

  var table = $('#indexObra').DataTable({
    "language": {
          "url": "{{ asset('/js/datatable_spanish.json') }}"
    },
    processing: true,
    serverSide: false,
    "ajax": {
      "url": '{!! route('obrasPresupuestadas') !!}',
      "type": 'POST',
      "data": function ( d ) {
        return $('#informeForm').serialize();
      }
    },
    columns: [
      { data: "id", name: "id" },
      { data: "nombre", name: "nombre" },
      { data: "fecha", name: "fecha" },
      { data: "cliente.nombre", name: "cliente" },
      { data: "precio_total_beneficio", name: "precio_total_beneficio" }
    ]
  });
  actualizarTotalPresupuesto();

  $("#RefreshButton").click(function(){
    table.ajax.reload();
    actualizarTotalPresupuesto();
  });
});

/* Actualizamos el total presupuestado con las fechas */
function actualizarTotalPresupuesto(){

  var form_data = $('#informeForm').serialize();
  var form_action = "{{route('actualizarTotalPresupuesto')}}";

  $.ajax({
    type: 'POST',
    url: form_action,
    data: form_data
  }).done(function(data){
    $('#totalPresupuestado').html(data + '€');
  });
}
</script>

@endsection
