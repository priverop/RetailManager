@extends('layouts.app')

@section('title', 'Obra Individual')

@section('content')


  <h1>{{ $obra->cliente->nombre }}</h1>
  <h4>{{ $obra->fecha }}</h4>
  <p>Identificador de obra: {{ $obra->id }}</p>
  <p>Precio total de obra: {{ $obra->precio_total }}</p>
  <p>Precio total de obra con beneficio: {{ $obra->precio_total_beneficio }}</p>
  <button class="btn btn-primary" id="addPresupuesto">Nuevo Presupuesto</button>
  <a href="{{  route('ExportPRE', ['id'=>$obra->id]) }}"><button class="btn btn-primary">Exportar a Factusol</button></a>
  <button class="btn btn-primary" id="infHoras">Informe Horas</button>
  <button class="btn btn-primary" id="infCompras">Informe Compras</button>

  <div class="row mt-5 p-3 border">
    <table id="presupuestoIndex">
      <thead>
        <tr>
          <th>#</th>
          <th>Concepto</th>
          <th>Precio und.</th>
          <th>Unidades</th>
          <th>Precio Total</th>
          <th>Beneficio</th>
          <th>Beneficio Global</th>
          <th>Precio + Beneficio</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($obra->presupuestos as $indice => $presupuesto)
          <tr>
            <td>{{$presupuesto->id}}</td>
            <td>{{$presupuesto->concepto}}</td>
            <td>{{$presupuesto->precio_total_unidad}}</td>
            <td>{{$presupuesto->unidades}}</td>
            <td>{{$presupuesto->precio_total}}</td>
            @if ($presupuesto->uso_beneficio_global === 1)
              <?php
                $beneficio = $presupuesto->obra->beneficio;
                $b_global = "Activado";
              ?>
            @else
              <?php
                $beneficio = $presupuesto->beneficio;
                $b_global = "Desactivado";
              ?>
            @endif
            <td>{{$beneficio}}</td>
            <td>{{$b_global}}</td>
            <td>{{$presupuesto->precio_total_unidad * (1 + ($beneficio * 0.01)) }}</td>
            <td>
              <a href="{{ route('presupuestos.show', ['id' => $presupuesto->id]) }}">
                <button class="btn btn-outline-primary btn-sm">Ver</button>
              </a>
              <button class="btn btn-outline-primary btn-sm" onclick="getDuplicateForm({{$presupuesto->id}})">Duplicar</button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <!-- Modal form to add a post -->
  <div id="addModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Añadir Presupuesto</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" id="addPresupuestoForm">

            <div class="form-group">
              <label class="control-label col-sm-2" for="title"><strong>Concepto</strong>:</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" name="concepto" autofocus>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="title"><strong>Beneficio</strong>:</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" name="beneficio" value="{{ $obra->beneficio }}" placeholder="%" autofocus>
              </div>
            </div>
            <div class="form-group">
              <input type="checkbox" id="uso_beneficio_global_1" name="uso_beneficio_global" value="1" class="form-control"  onclick="desmarcarCheckBox()">
              <input type="checkbox" id="uso_beneficio_global_0" name="uso_beneficio_global" value="0" class="form-control"  onclick="desmarcarCheckBox()" checked hidden>
              <label class="control-label col-sm-2" for="title"><strong>Beneficio Global</strong>:</label>
            </div>
            <input type="hidden" class="form-control" name="obra_id" value="{{ $obra->id }}">
          </form>
          <div class="modal-footer">
            <button id="addPresupuestoButton" type="button" class="btn btn-success add">
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
$(function(){
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $('#presupuestoIndex').DataTable({
    "language": {
          "url": "{{ asset('/js/datatable_spanish.json') }}"
      }
  });

  // Enviamos formulario de añadir presupuesto nuevo
  $("#addPresupuestoButton").click(function(event){
    event.preventDefault();
    var form_action = "{{route('presupuestos.store')}}";
    var formulario = $("#addPresupuestoForm").serialize();

    $.ajax({
      type: 'POST',
      url: form_action,
      data: formulario
    }).done(function(data){
      location.reload();
    });
  });

  // Mostramos ventana modal

  $("#addPresupuesto").click(function(){
    $("#addModal").modal('show');
  });

});

$('#infHoras').click(function(event){
  event.preventDefault();
  var form_action = "{{ route('createInfHoras', ['id' => $obra->id]) }}";

  $.ajax({
    dataType: 'json',
    type: 'GET',
    url: form_action
  }).done(function(data){
    $('#addPresupuesto').parent().prepend(data);
    $('#addModalInfHoras').modal('show');
  });

});

$('#infCompras').click(function(event){
  event.preventDefault();
  var form_action = "{{ route('createInfCompras', ['id' => $obra->id]) }}";

  $.ajax({
    dataType: 'json',
    type: 'GET',
    url: form_action
  }).done(function(data){
    $('#addPresupuesto').parent().prepend(data);
    $('#addModalInfCompras').modal('show');
  });

});


function desmarcarCheckBox(){
  if ($('#uso_beneficio_global_1').is(":checked")){
    $('#uso_beneficio_global_0').prop('checked',false);
  }else{
    $('#uso_beneficio_global_0').prop('checked',true);
  }

  if ($('#uso_beneficio_global_0').is(":checked")){
    $('#uso_beneficio_global_1').prop('checked',false);
  }else{
    $('#uso_beneficio_global_1').prop('checked',true);
  }

// Traemos el modal del concepto del presupuesto duplicado
function getDuplicateForm(presupuesto_id){
  event.preventDefault();
  var form_action = "{{ route('duplicateForm') }}";

  $.ajax({
    type: 'GET',
    url: form_action,
    data: {presupuesto_id: presupuesto_id}
  }).done(function(data){
    $("#addPresupuesto").next().prepend(data);
    $("#duplicateModal").modal('show');
  });
}
</script>


@endsection
