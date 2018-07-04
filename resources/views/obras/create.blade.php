<!-- Modal form to add a post -->
<div id="addModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Añadir Obra</h4>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      <div class="modal-body">
        @isset($obra)
        <form class="form-horizontal" role="form" action="{{ route('obras.update', ['id' => $obra->id]) }}" method="POST" id="addObrasForm">
          <input type="text" class="form-control" name="id" value="{{$obra->id}}" hidden>
        @else
        <form class="form-horizontal" role="form" action="{{ route('obras.store') }}" method="POST" id="addObrasForm">
        @endisset
          <div class="form-group">
            <label class="control-label col-sm-2" for="cliente"><strong>Cliente</strong>:</label>
            <p>
              Escriba el nombre del cliente y le aparecerá una lista de los clientes similares
            </p>
            <div class="col-sm-10">
              @isset($obra)
              <input type="text" class="typeahead form-control" name="cliente" placeholder="Buscar cliente" value="{{$obra->cliente->nombre}}" autofocus>
              @else
              <input type="text" class="typeahead form-control" name="cliente" placeholder="Buscar cliente" autofocus required>
              @endisset
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="nombre"><strong>Nombre:</strong></label>
            <div class="col-sm-10">
              @isset($obra)
              <input type="text" class="form-control" name="nombre" value="{{$obra->nombre}}">
              @else
              <input type="text" class="form-control" name="nombre" placeholder="Nombre de la obra" required>
              @endisset
            </div>
          </div>

          <div class="form-group">
            @isset($obra)
              @if($obra->v_activa == 1)
                <strong>Activar Versión: </strong>
                <input type="checkbox" name="select_v_activa" checked>
              @else
                <strong>Activar Versión: </strong>
                <input type="checkbox" name="select_v_activa">
              @endif
            @endisset
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="fecha"><strong>Fecha:</strong></label>
            <p>
              Pulse en el campo y seleccione la fecha en el calendario.
            </p>
            <div class="col-sm-10">
              @isset($obra)
              <input type="text" class="form-control" value="{{ $obra->fecha }}" name="fecha" id="datepicker">
              @else
              <input type="text" class="form-control" name="fecha" id="datepicker" required>
              @endisset
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="beneficio"><strong>Coste de montaje:</strong></label>
            <p>
              Seleccione un porcentaje o valor del coste del montaje. (Si el valor es 0, se tendrá en cuenta el porcentaje; por otro lado, si el valor es mayor que cero,
              se tendrá en cuenta dicho valor y se ignorará el porcentaje).
            </p>
            <div class="col-sm-10">
              @isset($obra)
              <input type="text" class="form-control" name="porcentaje_montaje" value="{{$obra->porcentaje_montaje}}" placeholder="%">
              <input type="text" class="form-control" name="valor_montaje" value="{{$obra->valor_montaje}}" placeholder="Valor">
              @else
              %:<input type="text" class="form-control" name="porcentaje_montaje" placeholder="%" value="0">
              Valor:<input type="text" class="form-control" name="valor_montaje" placeholder="Valor" value="0">
              @endisset
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="beneficio"><strong>Coste de transporte:</strong></label>
            <p>
              Seleccione un porcentaje o valor del coste del transporte. (Si el valor es 0, se tendrá en cuenta el porcentaje; por otro lado, si el valor es mayor que cero,
              se tendrá en cuenta dicho valor y se ignorará el porcentaje).
            </p>
            <div class="col-sm-10">
              @isset($obra)
              <input type="text" class="form-control" name="porcentaje_transporte" value="{{$obra->porcentaje_transporte}}" placeholder="%">
              <input type="text" class="form-control" name="valor_transporte" value="{{$obra->valor_transporte}}" placeholder="Valor">
              @else
              %: <input type="text" class="form-control" name="porcentaje_transporte" placeholder="%" value="0">
              Valor: <input type="text" class="form-control" name="valor_transporte" placeholder="Valor" value="0">
              @endisset
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="beneficio"><strong>Margen Estructural:</strong></label>
            <p>
              Seleccione el margen estructural (0.x)
            </p>
            <div class="col-sm-10">
              @isset($obra)
              <input type="text" class="form-control" name="margen_estructural" value="{{$obra->margen_estructural}}" placeholder="Margen Estructural">
              @else
              <input type="text" class="form-control" name="margen_estructural" placeholder="Margen Estructural" required>
              @endisset
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="beneficio"><strong>Margen Comercial:</strong></label>
            <p>
              Seleccione el margen comercial (0.x)
            </p>
            <div class="col-sm-10">
              @isset($obra)
              <input type="text" class="form-control" name="margen_comercial" value="{{$obra->margen_comercial}}" placeholder="Margen Comercial">
              @else
              <input type="text" class="form-control" name="margen_comercial" placeholder="Margen Comercial" required>
              @endisset
            </div>
          </div>

        </form>
        <div class="modal-footer">
          <button id="addObraButton" type="button" class="btn btn-success add">
            <span class='glyphicon glyphicon-check'></span>
            @isset($obra)
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

  $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true
    });

  $("#addObraButton").click(function(event){
    event.preventDefault();
    var form_action = $("#addObrasForm").attr("action");
    var formulario = $("#addObrasForm").serialize();
    var error = false;

    $("input[required]").each(function(){
      if($(this).val() == ""){
        error = true;
      }
    });
    if(error == true){
      alert("Por favor, rellene todos los campos");
    }
    else{
      $.ajax({
        @isset($obra)
          type: 'PUT',
        @else
          type: 'POST',
        @endisset
          url: form_action,
          data: formulario
      }).done(function(data){
        @isset($obra)
          location.reload();
        @else
          window.location.replace(data);
        @endisset
      });
    }

  });

    var clientes = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.whitespace('nombre'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        remote: {
            wildcard: '%QUERY',
            url: "{{ route('autocompletarCliente') }}"+"/?query=%QUERY",
                transform: function(response) {
                    return $.map(response, function(cliente) {
                        return { value: cliente.nombre };
                    });
                }
        }
    });

    $('.typeahead').typeahead({
        hint: false,
        highlight: true,
        minLength: 2,
        limit: 5
    },
    {
        name: 'Clientes',
        display: 'value',
        source: clientes,
        templates: {
  			empty: [
  			    '<div class="alert alert-danger" role="alert">Sin resultados</div>'
  			].join('\n'),

  			suggestion: function (data) {
  			    return '<div class="search-autocomplete-list">'+ data.value +'</div>'
  			}
  		},
    });
});


</script>
