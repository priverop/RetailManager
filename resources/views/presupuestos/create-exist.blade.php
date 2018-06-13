<!-- Modal form to add a post -->
<div id="existModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Añadir Mueble Existente</h4>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" method="POST" id="addMuebleForm">

          <div class="form-group">
            Selecciona el número de muebles que desee añadir.
            <div class="col-sm-10 mt-3">
              <table id="muebles" class="display" style="width:100%">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Concepto</th>
                    <th>Obra</th>
                    <th>Cliente</th>
                    <th>Fecha</th>
                    <th>Precio Final</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($presupuestos as $key => $value)
                  <tr>
                    <td> {{ $value->id}} </td>
                    <td> {{ $value->concepto }} </td>
                    <td> {{ $value->obra->nombre}} </td>
                    <td> {{ $value->obra->cliente->nombre }} </td>
                    <td> {{ $value->fecha }} </td>
                    <td> {{ $value->precio_total }} </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>

        </form>
        <div class="modal-footer">
          <button id="addMuebleButton" type="button" class="btn btn-success add">
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
  var table = $('#muebles').DataTable({
    "language": {
          "url": "{{ asset('/js/datatable_spanish.json') }}"
      }
  });

  $('#muebles tbody').on( 'click', 'tr', function () {
      $(this).toggleClass('selected');
  });

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('#addMuebleButton').click( function (event) {

    var form_action = "{{route('duplicateToObra', ['obra_id' => $obra_id])}}"
    var obra = "{{$obra_id}}";
    var muebles = [];

    table.rows('.selected').every(function(rowIdx, tableLoop, rowLoop){
      muebles.push(this.data()[0]);
    });

    $.ajax({
        type: 'POST',
        url: form_action,
        data: {muebles: muebles}
    }).done(function(data){
        location.reload();
    });

  });
});
</script>
