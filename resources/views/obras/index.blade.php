@extends('layouts.app')

@section('title', 'Obras')

@section('content')

<h1>Lista de Obras</h1>

<button class="btn btn-primary" id="addObra">Obra Nueva</button>

<div class="row">
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
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($obras as $key => $value)
      <tr>
          <td>{{ $value->id }}</td>
          <td>{{ $value->nombre }}</td>
          <td>{{ $value->fecha }}</td>
          <td>{{ $value->cliente->nombre }}</td>
          <td>{{ $value->precio_total}}</td>
          <td>{{ $value->beneficio }}%</td>
          <td>{{ $value->precio_total_beneficio}}</td>
          <td>
            <a href="{{ route('obras.show', ['id' => $value->id]) }}">
              <button class="btn btn-outline-primary btn-sm">Ver</button>
            </a>
            <button type="button" class="btn btn-outline-primary btn-sm mb-1" onclick="editar( {{$value->id}} )">Editar</button>
            <button type="button" class="btn btn-outline-primary btn-sm" onclick="eliminar( {{$value->id}} )">Borrar</button>
            <button type="button" class="btn btn-outline-primary btn-sm" onclick="duplicarObra( {{$value->id}} )">Duplicar</button>
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
$('#addObra').click(function(event){
  event.preventDefault();
  var form_action = "{{route('obras.create')}}";

  $.ajax({
    dataType: 'json',
    type: 'GET',
    url: form_action
  }).done(function(data){
    $('#addObra').parent().prepend(data);
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

      url: 'obras/'+id
  }).done(function(data){
      location.reload();
 });
}


function editar(id){
  var form_action = "{{route('obras.create')}}";

  $.ajax({
    dataType: 'json',
    type: 'GET',
    url: form_action,
    data: {id: id}
  }).done(function(data){
    $('#addObra').parent().prepend(data);
    $('#addModal').modal('show');
  });
}

function duplicarObra(obra_id){
  var form_action = "{{ route('duplicateObra', ['obra_id' => ":obra_id"]) }}";

  form_action = form_action.replace(':obra_id', obra_id);

  $.ajax({
    dataType: 'json',
    type: 'POST',
    url: form_action
  }).done(function(data){
    window.location.replace(data);
  });
}
</script>
@endsection
