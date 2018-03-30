@extends('layouts.app')

@section('title', 'Cliente')

@section('content')

<div class="row">
  <h1>{{ $cliente->nombre }}</h1>
  <div class="row mt-5 p-3 border">
    <div class="col-xs-12">

      <p>ID cliente: {{ $cliente-> id}}</p>
      <p>Nombre: {{ $cliente->nombre }}</p>
      <p>Direccion: {{ $cliente->direccion }}</p>
      <p>Provincia: {{ $cliente->provincia }}</p>
      <p>Telefono: {{ $cliente->telefono }}</p>
      <p>Obras: </p>
      <ul>
        @foreach($cliente->obras as $keys => $obras)
          <li><a href="{{route('obras.show', ['id' => $obras->id])}}">{{ $obras->fecha }}</a></li>
        @endforeach
      </ul>
      <button id="addObraModal" class="btn btn-primary">Obra Nueva</button>
    </div>
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
