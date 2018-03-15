@extends('layouts.app')

@section('title', 'Materiales')

@section('content')


<!-- Modal form to add a post -->
<!-- <div id="addModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" action="{{ route('materiales.store') }}" method="POST" id="addMaterialForm">
          <div class="form-group">
            <label class="control-label col-sm-2" for="title">Nombre:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="nombre" autofocus>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="content">Precio:</label>
            <div class="col-sm-10">
              <input class="form-control" name="precio">
            </div>
          </div>

            <div class="form-group">
            <label class="control-label col-sm-2" for="content">Proveedor:</label>
            <div class="col-sm-10">
              <input class="form-control" name="proveedor_id">
            </div>
          </div>



        </form>
        <div class="modal-footer">

          <button id="addMaterialButton" type="button" class="btn btn-success add" data-dismiss="modal">
            <span class='glyphicon glyphicon-check'></span> Añadir
          </button>



        <button type="button" class="btn btn-warning" data-dismiss="modal">
          <span class='glyphicon glyphicon-remove'></span> Cerrar
        </button>
      </div>
    </div>
  </div>
</div>
</div> -->



<!-- <script>
$(document).on('click', '.add-modal', function() {
  $('#addModal').modal('show');
});
$(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  // STORE material
  $('#addMaterialButton').click(function(event){
    event.preventDefault();
    var form_action = $("#addMaterialForm").attr("action");
    var datos = $("#addMaterialForm").serialize();
      console.log(datos);
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
</script> -->


<div class="container">

  <h2>Lista de Materiales</h2>

    <!-- <input type="button" id="añadir_material" class="add-modal mt-4 mb-4" value="Añadir Material"> -->

  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Material</th>
        <th>Proveedor</th>
        <th>Precio</th>

      </tr>
    </thead>
    <tbody>
      @foreach($pivotTable as $key => $value)
      <tr>
        <td>{{ $key }}</td>
        <td> <a href='materiales/{{ $value->material_id }}'> {{ $value->m_nombre}}</a> </td>
        <td><a href='proveedores/{{ $value->proveedor_id }}'>{{ $value->p_nombre }}</a> </td>
        <td>{{ $value->precio }}</td>




        <td><button type="button" id="eliminar" class="btn btn-danger eliminar" data-dismiss="modal">
          <span class='glyphicon glyphicon-remove'></span> X
        </button>
              <input type=“hidden” value='{{ $value->material_id }}' id='cliente_id' style="display:none;">
        </td>
        </tr>


          @endforeach


    </tbody>
  </table>
</div>

<script type="text/javascript">

$("body").on("click",".eliminar",function(){

  var id_bueno=$(this).next().val();
  var form_action = $("#addClienteForm").attr("action");
  var c_obj = $(this).parents("tr");

  $.ajax({
    dataType: 'json',
    type:'delete',
    url: 'materiales/'+id_bueno
  }).done(function(data){
    c_obj.remove();
    location.reload();
  });

});
</script>

@endsection
