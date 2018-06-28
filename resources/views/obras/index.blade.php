@extends('layouts.app')

@section('title', 'Obras')

@section('content')

<h1>Lista de Obras</h1>

<button class="btn btn-primary" id="addObra">Obra Nueva</button>

<div class="row">
  <table id="index">
    <thead>
      <!-- <tr>
        <th>#</th>
        <th>Nombre</th>
        <th>Fecha</th>
        <th>Cliente</th>
        <th>Precio Coste</th>
        <th>Beneficio</th>
        <th>Coste Montaje</th>
        <th>Coste Transporte</th>
        <th>Precio Total</th>
        <th>Acciones</th>
      </tr> -->
      <tr>
        <th>#</th>
        <th>Nombre</th>
        <th>Fecha</th>
        <th>Cliente</th>
        <th>Coste Base</th>
        <th>Coste Montaje</th>
        <th>Coste Transporte</th>
        <th>Coste Estructural</th>
        <th>Margen Estructural</th>
        <th>Coste</th>
        <th>Margen Coomercial</th>
        <th>Coste Comercial</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($obras as $key => $value)
      <tr>
          <!-- <td>{{ $value->id }}</td>
          <td>{{ $value->nombre }}</td>
          <td>{{ $value->fecha }}</td>
          <td>{{ $value->cliente->nombre }}</td>
          <td>{{ $value->precio_total }}</td>
          <td>{{ $value->beneficio }}%</td>
          <td>{{ $value->total_montaje }}</td>
          <td>{{ $value->total_transporte }}</td>
          <td>{{ $value->precio_total_beneficio}}</td> -->
          <td>{{ $value->id }}</td>
          <td>{{ $value->nombre }}</td>
          <td>{{ $value->fecha }}</td>
          <td>{{ $value->cliente->nombre }}</td>
          <td>{{ $value->precio_total }}</td>
          <td>{{ $value->total_montaje }}</td>
          <td>{{ $value->total_transporte }}</td>
          <td>{{ $value->precio_total_beneficio}}</td>
          <td>{{ $value->margen_estructural}}</td>
          <td>{{ $value->total_estructural}}</td>
          <td>{{ $value->margen_comercial}}</td>
          <td>{{ $value->total_comercial}}</td>
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
    dom: 'Bfrtip',
    buttons: [
        { extend: 'copyHtml5', text: 'Copiar',  exportOptions: {columns: [0, 1, 2, 3, 4, 5, 6]} },
        { extend: 'excelHtml5',  exportOptions: {columns: [0, 1, 2, 3, 4, 5, 6]} },
        { extend: 'csvHtml5',  exportOptions: {columns: [0, 1, 2, 3, 4, 5, 6]} },
        { extend: 'pdfHtml5', exportOptions: {columns: [0, 1, 2, 3, 4, 5, 6]}  }
    ],
    "language": {
          "url": "{{ asset('/js/datatable_spanish.json') }}"
      }
  });
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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
  var form_action = "{{ route('duplicateObraForm') }}";

  $.ajax({
    type: 'GET',
    url: form_action,
    data: {obra_id: obra_id}
  }).done(function(data){
    $("#index").parent().prepend(data);
    $("#duplicateModal").modal('show');
  });
}
</script>
@endsection
