
@extends('layouts.app')

@section('title', 'Clientes')

@section('content')


<!-- Modal form to add a post -->
<div id="addModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" action="{{ route('clientes.store') }}" method="POST" id="addClienteForm">
          <div class="form-group">
            <label class="control-label col-sm-2" for="title">Nombre:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="nombre" autofocus>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="content">Direccion:</label>
            <div class="col-sm-10">
              <input class="form-control" name="direccion">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="content">Provincia:</label>
            <div class="col-sm-10">
              <input class="form-control" name="provincia">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="content">Telefono:</label>
            <div class="col-sm-10">
              <input class="form-control" name="telefono">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="content">Código Postal:</label>
            <div class="col-sm-10">
              <input class="form-control" name="codigo-postal">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="content">NIF:</label>
            <div class="col-sm-10">
              <input class="form-control" name="nif">
            </div>
          </div>

        </form>
        <div class="modal-footer">

          <button id="addClienteButton" type="button" class="btn btn-success add" data-dismiss="modal">
            <span class='glyphicon glyphicon-check'></span> Añadir
          </button>
        </form>


        <button type="button" class="btn btn-warning" data-dismiss="modal">
          <span class='glyphicon glyphicon-remove'></span> Cerrar
        </button>
      </div>
    </div>
  </div>
</div>
</div>



<script>
$(document).on('click', '.add-modal', function() {
  $('#addModal').modal('show');
});
$(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  // STORE Cliente
  $('#addClienteButton').click(function(event){
    event.preventDefault();

    var form_action = $("#addClienteForm").attr("action");
    var datos = $("#addClienteForm").serialize();

    $.ajax({
      dataType: 'json',
      type:'POST',
      url: form_action,
      data: datos
    }).done(function(data){
      location.reload();
    });
  });
});
</script>









<div class="container">

  <h2>Lista de Clientes</h2>


  <input type="button" id="añadir_cliente" class="add-modal mt-4 mb-4" value="Añadir Cliente">


  <table class="table table-striped">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Dirección</th>
        <th>Provincia</th>
        <th>Teléfono</th>
        <th>Nif</th>
        <th>Obras</th>

      </tr>
    </thead>
    <tbody>

      @foreach($clientes as $key => $value)
      <tr>
        <td> <a href='clientes/{{ $value->id }}'> {{ $value->nombre }}</a> </td>

        <td>{{ $value->direccion }}</td>

        <td>{{ $value->provincia }}</td>

        <td>{{ $value->telefono }}</td>
        <td>{{ $value->nif}}</td>
        <td>
          @foreach($value->obras as $keys =>$values)
            {{ $values->id }}
          @endforeach
        </td>
      </tr>

      @endforeach

    </tbody>
  </table>
</div>

  @endsection
