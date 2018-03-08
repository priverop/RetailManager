@extends('layouts.app')

@section('title', 'proveedores')

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
        <form class="form-horizontal" role="form" action="{{ route('proveedores.store') }}" method="POST" id="addproveedorForm">
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

          <button id="addproveedorButton" type="button" class="btn btn-success add" data-dismiss="modal">
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
  // STORE proveedor
  $('#addproveedorButton').click(function(event){
    event.preventDefault();
    var form_action = $("#addproveedorForm").attr("action");
    var datos = $("#addproveedorForm").serialize();
      console.log(datos);
    $.ajax({
      dataType: 'json',
      type:'POST',
      url: form_action,
      data: datos
    }).done(function(data){
        console.log("daada");
      location.reload();
        
    });
  });
});
</script>









<div class="container">

  <h2>Lista de proveedores</h2>


  <input type="button" id="añadir_proveedor" class="add-modal mt-4 mb-4" value="Añadir proveedor">


  <table class="table table-striped">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Dirección</th>
        <th>Provincia</th>
        <th>Teléfono</th>
        <th>Nif</th>
        

      </tr>
    </thead>
    <tbody>

      @foreach($proveedores as $key => $value)
      <tr>
        <td> <a href='proveedores/{{ $value->id }}'> {{ $value->nombre }}</a> </td>

        <td>{{ $value->direccion }}</td>

        <td>{{ $value->provincia }}</td>

        <td>{{ $value->telefono }}</td>
        <td>{{ $value->nif}}</td>
        <td><button type="button" id="eliminar" class="btn btn-danger eliminar" data-dismiss="modal">
          <span class='glyphicon glyphicon-remove'></span> X
        </button>
              <input type=“hidden” value='{{ $value->id }}' id='cliente_id' style="display:none;">
        </td>
      </tr>

      @endforeach

    </tbody>
  </table>
</div>

<script type="text/javascript">
        $("body").on("click",".eliminar",function(){
            
        
           var id_bueno=$(this).next().val();
            //var tbody = $(this).find('tbody').val();
            
        var form_action = $("#addClienteForm").attr("action");
        var c_obj = $(this).parents("tr");
    
   
            $.ajax({

        dataType: 'json',

        type:'delete',

        url: 'proveedores/'+id_bueno

            }).done(function(data){
           
  
        c_obj.remove();

        

        location.reload();

    });

});    
    </script>

@endsection