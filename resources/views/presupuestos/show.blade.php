@extends('layouts.app')

@section('title', 'Presupuesto Individual')

@section('content')

<div class="pt-5" id="presupuestoContainer">
  <h1>Presupuesto Individual</h1>
  <div class="row mt-5 p-3 border">
    <div class="col-xs-12">
      <p>Nombre: {{ $presupuesto->nombre }}</p>
      <p>Cliente {{ $presupuesto->obra->cliente->nombre }}</p>
      <p>ID Presupuesto: {{ $presupuesto-> id}}</p>
    </div>
  </div>
  <div class="col-xs-12">
    <form action="{{ route('partes.store') }}" method="POST" id="addParteForm">
      <input type="text" placeholder="Concepto" name="concepto" id="addParteConcepto" />
      <button type="button" id="addParteButton" class="btn btn-primary">Añadir Parte</button>
    </form>
  </div>
  @foreach($presupuesto->partes as $key => $value)
  <div class="row mt-5 p-3 border">
    <div class="col-xs-12 col-md-2"><button type="button" class="addMaterial btn btn-secondary">Añadir Material</button></div>
    <div class="col-xs-12 col-md-10">

        Concepto: {{ $value->nombre }}

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
            @foreach($value->materiales as $mkey => $mvalue)
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
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  // Create Material
  $(".addMaterial").click(function(){
    var tbody = $(this).parent().parent().find("tbody");

    $.get('/materiales/create-small', function(data){
        $(tbody).append(data);
    });

  });

  // STORE Parte
  $('#addParteButton').click(function(){
    event.preventDefault();

    var form_action = $("#addParteForm").attr("action");
    var concepto = $("#addParteConcepto").val();
    var presupuesto_id = {{ $presupuesto->id }};

    $.ajax({
        dataType: 'json',
        type:'POST',
        url: form_action,
        data:{nombre:concepto, presupuesto_id:presupuesto_id }
    }).done(function(data){
        location.reload();
    });
  });
});
</script>

@endsection
