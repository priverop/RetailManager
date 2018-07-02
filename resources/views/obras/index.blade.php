@extends('layouts.app')

@section('title', 'Lista de Obras')

@section('content')
<?php $location = 'obras' ?>

<button class="btn btn-primary" id="addObra">Obra Nueva</button>

<div class="row mt-3">
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
        <th>Versión</th>
        <th>Versión Activa</th>
        <th>Fecha</th>
        <th>Cliente</th>
        <th>Total</th>
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
          <td>{{ $value->version }} de {{ $value->v_ultima }}</td>
          @if($value->v_activa == 1)
            <td>Activa</td>
          @else
            <td>No Activa</td>
          @endif
          <td>{{ $value->fecha }}</td>
          <td>{{ $value->cliente->nombre }}</td>
          <td>{{ $value->total_comercial}} €</td>
          <td>
            <a href="{{ route('obras.show', ['id' => $value->id]) }}">
              <button class="btn btn-outline-primary btn-sm">Ver</button>
            </a>
            <button type="button" class="btn btn-outline-primary btn-sm mb-1" onclick="editar( {{$value->id}} )">Editar</button>
            <button type="button" class="btn btn-outline-primary btn-sm" onclick="eliminar( {{$value->id}} )">Borrar</button>
            <button type="button" class="btn btn-outline-primary btn-sm" onclick="duplicarObra( {{$value->id}} )">Duplicar</button>
            <button type="button" class="btn btn-outline-primary btn-sm" onclick="nuevaVersion( '{{ route('duplicateObra', ['obra_id' => $value->id]) }}' )">Nueva Versión</button>
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

function nuevaVersion(route){
  var form_action = route;
  var v_nueva = 1;
  console.log(form_action);
  $.ajax({
      dataType: 'json',
      type: 'POST',
      url: form_action,
      data: {v_nueva: v_nueva}
  }).done(function(data){
    window.location.replace(data);
  });

}
</script>
@endsection
