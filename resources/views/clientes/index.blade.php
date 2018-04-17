@extends('layouts.app')

@section('title', 'Clientes')

@section('content')

<h1>Lista de Clientes</h1>

<button class="btn btn-primary" id="addCliente">Cliente Nuevo</button>

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
        <th>Obras</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($clientes as $key => $value)
      <tr>
          <td>{{ $key }}</td>
          <td>{{ $value->nombre }}</td>
          <td>{{ $value->direccion }}</td>
          <td>{{ $value->provincia}}</td>
          <td>{{ $value->telefono }}</td>
          <td>{{ $value->nif}}</td>
          <td>
            @foreach ($value->obras as $indice => $obra)
            <a href="{{ route('obras.show', ['id' => $obra->id]) }}">{{ $obra -> id }}</a>
            @endforeach
          </td>
          <td>
            <a href="{{ route('clientes.show', ['id' => $value->id]) }}">
              <button class="btn btn-outline-primary btn-sm">Ver</button>
            </a>
            <button type="button" class="btn btn-outline-primary btn-sm mb-1" onclick="editar( {{$value->id}} )">Editar</button>
            <button type="button" class="btn btn-outline-primary btn-sm" onclick="eliminar( {{$value->id}} )">Borrar</button>
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
$('#addCliente').click(function(event){
  event.preventDefault();
  var form_action = "{{route('clientes.create')}}";

  $.ajax({
    dataType: 'json',
    type: 'GET',
    url: form_action
  }).done(function(data){
    $('#addCliente').parent().prepend(data);
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

function eliminar(id){
  $.ajax({
      dataType: 'json',

      type:'delete',

      url: 'clientes/'+id
  }).done(function(data){
      location.reload();
 });
}


function editar(id){
  var form_action = "{{route('clientes.create')}}";

  $.ajax({
    dataType: 'json',
    type: 'GET',
    url: form_action,
    data: {id: id}
  }).done(function(data){
    $('#addCliente').parent().prepend(data);
    $('#addModal').modal('show');
  });
}
</script>
@endsection
