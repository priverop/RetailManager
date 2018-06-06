<!-- Modal form to add a post -->
<div id="addModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Añadir Obra</h4>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      <div class="modal-body">
        <!-- <form class="form-horizontal" role="form" action="{{ route('obras.store') }}" method="POST" id="addObrasForm"> -->
        @isset($obra)
        <form class="form-horizontal" role="form" action="{{ route('obras.update', ['id' => $obra->id]) }}" method="POST" id="addObrasForm">
          <input type="text" class="form-control" name="id" value="{{$obra->id}}" hidden>
        @else
        <form class="form-horizontal" role="form" action="{{ route('obras.store') }}" method="POST" id="addObrasForm">
        @endisset
          <div class="form-group">
            <label class="control-label col-sm-2" for="title"><strong>Cliente</strong>:</label>
            <p>
              Escriba el nombre del cliente y le aparecerá una lista de los clientes similares
            </p>
            <div class="col-sm-10">
              @isset($obra)
              <input type="text" class="typeahead form-control" name="nombre" placeholder="Buscar cliente" value="{{$obra->cliente->nombre}}" autofocus>
              @else
              <input type="text" class="typeahead form-control" name="nombre" placeholder="Buscar cliente" autofocus>
              @endisset
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="content"><strong>Nombre:</strong></label>
            <div class="col-sm-10">
              @isset($obra)
              <input type="text" class="form-control" name="nombre" value="{{$obra->nombre}}">
              @else
              <input type="text" class="form-control" name="nombre" placeholder="Nombre de la obra">
              @endisset
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="content"><strong>Fecha:</strong></label>
            <p>
              Introduzca la fecha o, tras hacer click, pulse en la pestaña (▼) de la derecha del todo.
            </p>
            <div class="col-sm-10">
              @isset($obra)
              <?php
                $date = $obra->fecha;
                $date = strtotime($date);
                $date = date("Y-m-d", $date);
              ?>
              <input type="date" class="form-control" value="{{ $date }}" name="fecha">
              @else
              <input type="date" class="form-control" name="fecha">
              @endisset
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="content"><strong>Beneficio:</strong></label>
            <p>
              Seleccione un porcentaje de beneficio para el presupuesto (puede modificarse posteriormente, puede dejarlo en 0 de momento).
            </p>
            <div class="col-sm-10">
              @isset($obra)
              <input type="text" class="form-control" name="beneficio" value="{{$obra->beneficio}}" placeholder="%">
              @else
              <input type="text" class="form-control" name="beneficio" value="30" placeholder="%">
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

  $("#addObraButton").click(function(event){
    event.preventDefault();
    var form_action = $("#addObrasForm").attr("action");
    var formulario = $("#addObrasForm").serialize();
    console.log(formulario);

    $.ajax({
      @isset($obra)
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
