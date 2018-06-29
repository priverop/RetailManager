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
    <button id="addObraModal" class="btn btn-primary">Obra Nueva</button>
  </div>
</div>

<!-- Modal form to add a post -->
<div id="addModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Añadir Obra</h4>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" action="{{ route('obras.store') }}" method="POST" id="addObrasForm">

          <div class="form-group">
            <label class="control-label col-sm-2" for="content"><strong>Fecha:</strong></label>
            <p>
              Introduzca la fecha o, tras hacer click, pulse en la pestaña (▼) de la derecha del todo.
            </p>
            <div class="col-sm-10">
              <input type="date" class="form-control" name="fecha" autofocus>
              <input type="hidden" name="nombre" value="{{ $cliente->nombre }}">
            </div>
          </div>

        </form>
        <div class="modal-footer">
          <button id="addObraButton" type="button" class="btn btn-success add">
            <span class='glyphicon glyphicon-check'></span> Añadir
          </button>
          <button type="button" class="btn btn-warning" data-dismiss="modal">
            <span class='glyphicon glyphicon-remove'></span> Cerrar
          </button>
        </div>
      </div>
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


    $('#index').DataTable({
      "language": {
            "url": "{{ asset('/js/datatable_spanish.json') }}"
        }
    });


  $("#addObraModal").click(function(event){
    $("#addModal").modal('show');
  });

  $("#addObraButton").click(function(event){
    event.preventDefault();
    var form_action = $("#addObrasForm").attr("action");
    var formulario = $("#addObrasForm").serialize();

    $.ajax({
        type: 'POST',
        url: form_action,
        data: formulario
    }).done(function(data){
        location.reload();
    });

  });

});


</script>


@endsection
