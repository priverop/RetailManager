@extends('layouts.app')

@section('title', 'Lista de Proveedores')

@section('content')
<?php $location = 'proveedores' ?>

<button class="btn btn-primary" id="addProveedor">Proveedor Nuevo</button>

<div class="row">
  <table id="index">
    <thead>
      <tr>
        <th>#</th>
        <th>Nombre</th>
        <th>Dirección</th>
        <th>Provincia</th>
        <th>Teléfono</th>
        <th>Nif</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($proveedores as $key => $value)
      <tr>
          <td>{{ $value->id }}</td>
          <td><a href="{{ route('proveedores.show', ['id' => $value->id]) }}">{{ $value->nombre }}</a></td>
          <td>{{ $value->direccion }}</td>
          <td>{{ $value->provincia}}</td>
          <td>{{ $value->telefono }}</td>
          <td>{{ $value->nif}}</td>
          <td>
            <!-- <a href="{{ route('proveedores.show', ['id' => $value->id]) }}">
              <button class="btn btn-outline-primary btn-sm">Ver</button>
            </a> -->
            <button type="button" class="btn btn-outline-primary btn-sm mb-1" onclick="editar( {{$value->id}} )">Editar</button>
            <button type="button" class="btn btn-outline-primary btn-sm" onclick="eliminar( this )">Borrar</button>
            <input type="hidden" value="{{route('proveedores.destroy', ['id' => $value->id])}}">
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

<script>
$(function(){
  $('#index').DataTable({
    "language": {
          "url": "{{ asset('/js/datatable_spanish.json') }}"
      }
  });
});

/*
* Añadir Obra
* Traemos el create.blade por GET
* Lo metemos dentro del row y activamos el modal
*/
$('#addProveedor').click(function(event){
  event.preventDefault();
  var form_action = "{{route('proveedores.create')}}";

  $.ajax({
    dataType: 'json',
    type: 'GET',
    url: form_action
  }).done(function(data){
    $('#addProveedor').parent().prepend(data);
    $('#addModal').modal('show');
  });

});

</script>

<script type="text/javascript">
      $(function() {
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
    });

</script>

<script>

function eliminar(elemento){
  var form_action = $(elemento).next().val();

  $.ajax({
    dataType: 'json',
    type: 'DELETE',
    url: form_action
  }).done(function(data){
    location.reload();
  });
}


function editar(id){
  var form_action = "{{route('proveedores.create')}}";

  $.ajax({
    dataType: 'json',
    type: 'GET',
    url: form_action,
    data: {id: id}
  }).done(function(data){
    $('#addProveedor').parent().prepend(data);
    $('#addModal').modal('show');
  });
}
</script>
@endsection
