<!-- Modal form to add a post -->
<div id="addModalInfCompras" class="modal fade " role="dialog">
  <div class="modal-dialog modal-grande">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Informe de Compras</h4>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      <div class="modal-body">
        <div class="col-xs-12">
          <div class="row">
            <table id="presupuestoIndex" class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Presupuesto</th>
                  <th>Material</th>
                  <th>Proveedor</th>
                  <th>Unidades</th>
                  <th>Largo</th>
                  <th>Alto</th>
                  <th>Ancho</th>
                  <th>Total M</th>
                  <th>Total M2</th>
                  <th>Total M3</th>
                  <th>Precio Unidad</th>
                  <th>Descuento</th>
                  <th>Precio Total</th>
                </tr>
              </thead>
              <tbody>
                <?php $totalHoras = 0;?>
                @foreach($obra->presupuestos as $indice => $presupuesto)
                  @foreach($presupuesto->partes as $pkey=> $parte)
                    @foreach($parte->materiales as $mkey=> $material)
                      <tr>
                        <td>{{$material->id}}</td>
                        <td>{{$presupuesto->concepto}}</td>
                        <td>{{$material->nombre}}</td>
                        <td>{{$material->pivot->proveedors_nombre}}</td>
                        <td>{{$material->pivot->unidades}}</td>
                        <td>{{$material->pivot->largo}}</td>
                        <td>{{$material->pivot->alto}}</td>
                        <td>{{$material->pivot->ancho}}</td>
                        <td>{{$material->pivot->total_m}}</td>
                        <td>{{$material->pivot->total_m2}}</td>
                        <td>{{$material->pivot->total_m3}}</td>
                        <td>{{$material->precio}}€ / {{$material->unidad}}</td>
                        @if ($material->descuento > 0)
                          <td>{{$material->descuento}}% superando {{$material->min_unidades}} {{$material->unidad}}</td>
                        @else
                          <td>Sin descuento</td>
                        @endif
                        <td>{{$material->pivot->precio_total}}€</td>
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
