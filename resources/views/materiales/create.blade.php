<!-- Modal form to add a post -->
<div id="addModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Añadir Material</h4>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      <div class="modal-body">
        @isset($material)
        <form class="form-horizontal" role="form" action="{{ route('materiales.update', ['id' => $material->id]) }}" method="POST" id="addMaterialForm">
        @else
        <form class="form-horizontal" role="form" action="{{ route('materiales.store') }}" method="POST" id="addMaterialForm">
        @endisset
          <div class="form-group">
            <label class="control-label col-sm-2" for="title"><strong>Nombre</strong>:</label>
            <div class="col-sm-10">
              @isset($material)
              <input type="text" class="form-control" name="nombre" value="{{$material->nombre}}" autofocus>
              @else
              <input type="text" class="form-control" name="nombre" autofocus>
              @endisset
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="title"><strong>Tipo</strong>:</label>
            <div class="col-sm-10">

              <select class="form-control" name="tipo" id="selectTipo">
                <option value="madera"
                  @isset($material) @if($material->tipo === "madera") selected
                  @endif @endisset
                >Madera
                </option>
                <option value="electricidad"
                @isset($material) @if($material->tipo === "electricidad") selected
                 @endif @endisset
                >Electricidad</option>
                <option value="herraje"
                @isset($material) @if($material->tipo === "herraje") selected
                 @endif @endisset
                >Herraje</option>
                <option value="complemento"
                @isset($material) @if($material->tipo === "complemento") selected
                 @endif @endisset
                >Complemento</option>
                <option value="piezaCompuesta"
                @isset($material) @if($material->tipo === "piezaCompuesta") selected
                 @endif @endisset
                >Pieza Compuesta</option>
                <option value="embalaje"
                @isset($material) @if($material->tipo === "embalaje") selected
                 @endif @endisset
                >Embalaje</option>
                <option value="acabado"
                @isset($material) @if($material->tipo === "acabado") selected
                 @endif @endisset
                >Acabado</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="content"><strong>Precio:</strong></label>
            <div class="col-sm-10">
              @isset($precio)
              <input class="form-control" name="precio" value="{{$precio}}">
              @else
              <input class="form-control" name="precio">
              @endisset
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="content"><strong>Proveedor:</strong></label>
            @isset($proveedor)
            <input type="hidden" value="{{$proveedor->id}}" name="proveedor_id" />
              {{$proveedor->nombre}} -
              <i class="text-warning">Si selecciona otro proveedor se sustituirá. Recuerde que solo puede elegir un proveedor.</i>
            @endisset
            <div class="col-sm-10 mt-3">
              <table id="selectMaterial" class="display" style="width:100%">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nombre</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($proveedores as $key => $value)
                  <tr>
                    <td>{{ $key }}</td>
                    <td>{{ $value->nombre }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>

        </form>
        <div class="modal-footer">
          <button id="addMaterialButton" type="button" class="btn btn-success add">
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
$(function() {
  var table = $('#selectMaterial').DataTable({
    "language": {
          "url": "{{ asset('/js/datatable_spanish.json') }}"
      }
  });

  $('#selectMaterial tbody').on( 'click', 'tr', function () {
      $(this).toggleClass('selected');
  });

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $('#addMaterialButton').click( function (event) {
    event.preventDefault;
    var form_action = $("#addMaterialForm").attr("action");
    var nRows = table.rows('.selected').data().length;

    if(nRows > 1){
      alert('Por favor elija solo un proveedor');
    }
    else if(nRows == 1){
      table.rows('.selected').every(function(rowIdx, tableLoop, rowLoop){
        var proveedorID = this.data()[0];
        var formulario = $("#addMaterialForm").serialize() + '&proveedorID='+proveedorID;

        $.ajax({
          @isset($material)
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
    }
    else{
      var formulario = $("#addMaterialForm").serialize();
      $.ajax({
          @isset($material)
            type: 'PUT',
          @else
            type: 'POST',
          @endisset
          url: form_action,
          data: formulario
      }).done(function(data){
          location.reload();
      });
    }

  });
});
</script>
