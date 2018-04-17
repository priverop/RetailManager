<!-- Modal form to add a post -->
<div id="addModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Añadir Cliente</h4>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      <div class="modal-body">
        @isset($cliente)
        <form class="form-horizontal" role="form" action="{{ route('clientes.update', ['id' => $cliente->id]) }}" method="POST" id="addClientesForm">
          <input type="text" class="form-control" name="id" value="{{$cliente->id}}" hidden>
        @else
        <form class="form-horizontal" role="form" action="{{ route('clientes.store') }}" method="POST" id="addClientesForm">
        @endisset
          <div class="form-group">
            <label class="control-label col-sm-6" for="title"><strong>Nombre</strong>:</label>
            <div class="col-sm-10">
              @isset($cliente)
              <input type="text" class="typeahead form-control" name="nombre" placeholder="Nombre del cliente" value="{{$cliente->nombre}}" autofocus>
              @else
              <input type="text" class="typeahead form-control" name="nombre" placeholder="Nombre del cliente" autofocus>
              @endisset
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-6" for="title"><strong>Dirección</strong>:</label>
            <div class="col-sm-10">
              @isset($cliente)
              <input type="text" class="typeahead form-control" name="direccion" placeholder="Dirección del cliente" value="{{$cliente->direccion}}" autofocus>
              @else
              <input type="text" class="typeahead form-control" name="direccion" placeholder="Dirección del cliente" autofocus>
              @endisset
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-6" for="title"><strong>Código Postal</strong>:</label>
            <div class="col-sm-10">
              @isset($cliente)
              <input type="text" class="typeahead form-control" name="cp" placeholder="CP del cliente" value="{{$cliente->cp}}" autofocus>
              @else
              <input type="text" class="typeahead form-control" name="cp" placeholder="CP del cliente" autofocus>
              @endisset
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-6" for="title"><strong>Provincia</strong>:</label>
            <div class="col-sm-10">
              @isset($cliente)
              <input type="text" class="typeahead form-control" name="provincia" placeholder="Provincia del cliente" value="{{$cliente->provincia}}" autofocus>
              @else
              <input type="text" class="typeahead form-control" name="provincia" placeholder="Provincia del cliente" autofocus>
              @endisset
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-6" for="title"><strong>Teléfono</strong>:</label>
            <div class="col-sm-10">
              @isset($cliente)
              <input type="text" class="typeahead form-control" name="telefono" placeholder="Teléfono del cliente" value="{{$cliente->telefono}}" autofocus>
              @else
              <input type="text" class="typeahead form-control" name="telefono" placeholder="Teléfono del cliente" autofocus>
              @endisset
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-6" for="title"><strong>NIF</strong>:</label>
            <div class="col-sm-10">
              @isset($cliente)
              <input type="text" class="typeahead form-control" name="nif" placeholder="NIF del cliente" value="{{$cliente->nif}}" autofocus>
              @else
              <input type="text" class="typeahead form-control" name="nif" placeholder="NIF del cliente" autofocus>
              @endisset
            </div>
          </div>



        </form>
        <div class="modal-footer">
          <button id="addClienteButton" type="button" class="btn btn-success add">
            <span class='glyphicon glyphicon-check'></span>
            @isset($cliente)
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

  $("#addClienteButton").click(function(event){
    event.preventDefault();
    var form_action = $("#addClientesForm").attr("action");
    var formulario = $("#addClientesForm").serialize();
    console.log(formulario);

    $.ajax({
      @isset($cliente)
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
