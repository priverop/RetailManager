<!-- Modal form to add a post -->
<div id="addModalInfHoras" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Informe de Horas</h4>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      <div class="modal-body">
        <div class="row mt-5 p-3 border table">
          <table id="presupuestoIndex">
            <thead>
              <tr>
                <th>#</th>
                <th>Presupuesto</th>
                <th>Total horas</th>
              </tr>
            </thead>
            <tbody>
              <?php $totalHoras = 0;?>
              @foreach($obra->presupuestos as $indice => $presupuesto)
                <tr>
                  <td>{{$indice}}</td>
                  <td>{{$presupuesto->concepto}}</td>
                  <?php
                    $horasMaquinas = 0;
                    $horasManoDeObra = 0;
                    $horas = 0;
                    $horasMaquinas += $presupuesto->t_seccionadora + $presupuesto->t_escuadradora + $presupuesto->t_elaboracion;
                    $horasMaquinas += $presupuesto->t_canteadora + $presupuesto->t_punto + $presupuesto->t_prensa;

                    $horasManoDeObra += ($presupuesto->maquinas_operarios * $presupuesto->maquinas_horas_operario) + ($presupuesto->bancos_operarios * $presupuesto->bancos_horas_operario);
                    $horasManoDeObra += ($presupuesto->maquinas_oficial_1_operarios * $presupuesto->maquinas_oficial_1_horas_operario) + ($presupuesto->producto_ter_1_operarios * $presupuesto->producto_ter_1_horas_operario);
                    $horasManoDeObra += ($presupuesto->productor_ter_2_operarios * $presupuesto->productor_ter_2_horas_operario) + ($presupuesto->oficial_1_operarios * $presupuesto->oficial_1_horas_operario);
                    $horasManoDeObra += ($presupuesto->oficial_2_operarios * $presupuesto->oficial_2_horas_operario) + ($presupuesto->ayudante_operarios * $presupuesto->ayudante_horas_operario);

                    $horas = $horasMaquinas + $horasManoDeObra;

                    $totalHoras += $horas;
                  ?>
                  <td>{{$horas}}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <h4 class="modal-title">Total Horas: {{$totalHoras}}</h4>
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
