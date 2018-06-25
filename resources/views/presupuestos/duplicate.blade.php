<div id="duplicateModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Duplicar Presupuesto</h4>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" id="duplicatePresupuestoForm">

          <div class="form-group">
            <label class="control-label col-sm-3" for="title"><strong>Concepto nuevo</strong>:</label>

            <div class="col-sm-9">
              <input type="text" class="form-control" name="concepto" autofocus>
            </div>
          </div>
        </form>
        <div class="modal-footer">
          <button id="duplicatePresupuestoButton" type="button" class="btn btn-success add">
            <span class='glyphicon glyphicon-check'></span> Aceptar
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
$(function(){
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $("#duplicatePresupuestoButton").click(function(event){
    event.preventDefault();
    var form_action = "{{ route('duplicatePresupuesto', ['presupuesto_id' => $presupuesto_id]) }}";
    var formulario = $("#duplicatePresupuestoForm").serialize();

    $.ajax({
        dataType: 'json',
        type: 'POST',
        url: form_action,
        data: formulario
    }).done(function(data){
      window.location.replace(data);
    });

  });
});
</script>
