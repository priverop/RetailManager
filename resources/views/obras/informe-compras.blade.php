<!-- Modal form to add a post -->
<div id="addModalInfCompras" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Informe de Compras</h4>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      <div class="modal-body">
        <div class="row mt-5 p-3 border table">
          <table id="presupuestoIndex">
            <thead>
              <tr>
                <th>#</th>
                <th>Presupuesto</th>
                <th>Material</th>
                <th>Unidades</th>
              </tr>
            </thead>
            <tbody>
              <?php $totalHoras = 0;?>
              @foreach($obra->presupuestos as $indice => $presupuesto)
                @foreach($presupuesto->partes as $pkey=> $parte)
                  @foreach($parte->materiales as $mkey=> $material)
                    <tr>
                      <td>{{$mkey}}</td>
                      <td>{{$presupuesto->concepto}}</td>
                      <td>{{$material->nombre}}</td>
                      <td>{{$material->pivot->unidades}}</td>
                    </tr>
                  @endforeach
                @endforeach
              @endforeach
            </tbody>
          </table>
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


});


</script>
