@extends('layouts.app')

@section('title', 'Presupuesto Individual')

@section('content')

<div class="container pt-5" id="presupuestoContainer">
  <h1>Presupuesto Individual</h1>
  <div class="row mt-5 p-3 border">
    <div class="col-xs-12">
      <p>Nombre: {{ $presupuesto->nombre }}</p>
      <p>Cliente {{ $presupuesto->obra->cliente->nombre }}</p>
    </div>
  </div>
  <div class="col-xs-12">
    <button type="button" id="addParte" class="btn btn-primary">Añadir Parte</button>
  </div>
  @foreach($presupuesto->partes as $key => $value)
  <div class="row mt-5 p-3 border">
    <div class="col-xs-12 col-md-2"><button type="button" id="addParte" class="btn btn-secondary">Añadir Material</button></div>
    <div class="col-xs-12 col-md-10">

        Concepto:{{ $value->nombre }}

        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Material</th>
              <th scope="col">Precio</th>
              <th scope="col">Proveedor</th>
            </tr>
          </thead>
          <tbody>
            @foreach($key->materiales as $mkey => $mvalue)
            <tr>
              <th scope="row">{{$mkey}}</th>
              <td>{{$mvalue->nombre}}</td>
              <td>{{$mvalue->precio}}</td>
              <td>{{$mvalue->proveedor->nombre}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>

    </div>
  </div>
  @endforeach
</div>

<script>
$(function() {
  $('#addParte').click(function(){
    event.preventDefault();

    var bloque = '<div className="row mt-5 border"><div className="col-xs-12">Nueva Parte</div></div>';

    $('#presupuestoContainer').append(bloque);
  });
});
</script>

@endsection
