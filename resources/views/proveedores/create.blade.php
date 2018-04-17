<!-- Modal form to add a post -->
<div id="addModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Añadir Proveedore</h4>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      <div class="modal-body">
        @isset($proveedor)
        <form class="form-horizontal" role="form" action="{{ route('proveedores.update', ['id' => $proveedor->id]) }}" method="POST" id="addProveedoresForm">
          <input type="text" class="form-control" name="id" value="{{$proveedor->id}}" hidden>
        @else
        <form class="form-horizontal" role="form" action="{{ route('proveedores.store') }}" method="POST" id="addProveedoresForm">
        @endisset
          <div class="form-group">
            <label class="control-label col-sm-6" for="title"><strong>Nombre</strong>:</label>
            <div class="col-sm-10">
              @isset($proveedor)
              <input type="text" class="typeahead form-control" name="nombre" placeholder="Nombre del proveedor" value="{{$proveedor->nombre}}" autofocus>
              @else
              <input type="text" class="typeahead form-control" name="nombre" placeholder="Nombre del proveedor" autofocus>
              @endisset
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-6" for="title"><strong>Dirección</strong>:</label>
            <div class="col-sm-10">
              @isset($proveedor)
              <input type="text" class="typeahead form-control" name="direccion" placeholder="Dirección del proveedor" value="{{$proveedor->direccion}}" autofocus>
              @else
              <input type="text" class="typeahead form-control" name="direccion" placeholder="Dirección del proveedor" autofocus>
              @endisset
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-6" for="title"><strong>Código Postal</strong>:</label>
            <div class="col-sm-10">
              @isset($proveedor)
              <input type="text" class="typeahead form-control" name="cp" placeholder="CP del proveedor" value="{{$proveedor->cp}}" autofocus>
              @else
              <input type="text" class="typeahead form-control" name="cp" placeholder="CP del proveedor" autofocus>
              @endisset
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-6" for="title"><strong>Provincia</strong>:</label>
            <div class="col-sm-10">
              @isset($proveedor)
              <input type="text" class="typeahead form-control" name="provincia" placeholder="Provincia del proveedor" value="{{$proveedor->provincia}}" autofocus>
              @else
              <input type="text" class="typeahead form-control" name="provincia" placeholder="Provincia del proveedor" autofocus>
              @endisset
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-6" for="title"><strong>Teléfono</strong>:</label>
            <div class="col-sm-10">
              @isset($proveedor)
              <input type="text" class="typeahead form-control" name="telefono" placeholder="Teléfono del proveedor" value="{{$proveedor->telefono}}" autofocus>
              @else
              <input type="text" class="typeahead form-control" name="telefono" placeholder="Teléfono del proveedor" autofocus>
              @endisset
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-6" for="title"><strong>NIF</strong>:</label>
            <div class="col-sm-10">
              @isset($proveedor)
              <input type="text" class="typeahead form-control" name="nif" placeholder="NIF del proveedor" value="{{$proveedor->nif}}" autofocus>
              @else
              <input type="text" class="typeahead form-control" name="nif" placeholder="NIF del proveedor" autofocus>
              @endisset
            </div>
          </div>



        </form>
        <div class="modal-footer">
          <button id="addProveedoreButton" type="button" class="btn btn-success add">
            <span class='glyphicon glyphicon-check'></span>
            @isset($proveedor)
            Actualizar
            @else
            Añadir
            @endisset
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

  $("#addProveedoreButton").click(function(event){
    event.preventDefault();
    var form_action = $("#addProveedoresForm").attr("action");
    var formulario = $("#addProveedoresForm").serialize();
    console.log(formulario);

    $.ajax({
      @isset($proveedor)
        type: 'PUT',
      @else
        type: 'POST',
      @endisset
        url: form_action,
        data: formulario
    }).done(function(data){
        location.reload();
    });

  });

});


</script>
