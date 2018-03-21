@extends('layouts.app')

@section('title', 'Materiales')

@section('content')

  <h2>Lista de Materiales</h2>

<div class="row">

  <input type="button" id="addMaterial" class="btn btn-primary mt-4 mb-4" value="Añadir Material">

  <table id="indexMaterial" class="display" style="width:100%">
    <thead>
      <tr>
        <th>#</th>
        <th>Material</th>
        <th>Tipo</th>
        <th>Proveedor</th>
        <th>Precio</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($pivotTable as $key => $value)
      <tr>
        <td>{{ $key }}</td>
        <td><a href='materiales/{{ $value->material_id }}'> {{ $value->m_nombre}}</a> </td>
        <td>{{ $value->m_tipo}}</td>
        <td><a href='proveedores/{{ $value->proveedor_id }}'>{{ $value->p_nombre }}</a> </td>
        <td>{{ $value->precio }}</td>
        <td>
          <button type="button" class="btn btn-outline-primary btn-sm mb-1" onclick="editarMaterial( {{$value->material_id}}, {{ $value->proveedor_id }})">Editar</button>
          <button type="button" class="btn btn-outline-primary btn-sm" onclick="eliminarMaterial({{ $key }})">Borrar</button>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<script type="text/javascript">
$(function() {
  $("#indexMaterial").DataTable({
    "language": {
          "url": "{{ asset('/js/datatable_spanish.json') }}"
      }
  });
});

/*
* Añadir Material
* Traemos el create.blade por GET
* Lo metemos dentro del row y activamos el modal
*/
$('#addMaterial').click(function(event){
  event.preventDefault();
  var form_action = "{{route('materiales.create')}}";

  $.ajax({
    dataType: 'json',
    type: 'GET',
    url: form_action
  }).done(function(data){
    $('#addMaterial').parent().prepend(data);
    $('#addModal').modal('show');
  });

});

function editarMaterial(material_id, proveedor_id){
  var form_action = "{{route('materiales.create')}}";

  $.ajax({
    dataType: 'json',
    type: 'GET',
    url: form_action,
    data: {material_id: material_id, proveedor_id: proveedor_id }
  }).done(function(data){
    $('#addMaterial').parent().prepend(data);
    $('#addModal').modal('show');
  });
}
</script>

@endsection
