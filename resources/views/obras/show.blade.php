@extends('layouts.app')

@section('title', 'Obra Individual')

@section('content')

<?php $location = 'obras' ?>

<div class="row">
  <div class="col">
    <h2>Información de la Obra</h2>
    <table class="table mb-0">
      <tr>
        <th>Nombre</th>
        <td>{{ $obra[0]->nombre }}</td>
        <th>Versión</th>
        <td>
          @if($obra[0]->v_activa == 1)
            <p>{{ $obra[0]->version }} - Activa</p>
          @else
            <p>{{ $obra[0]->version }} - No Activa</p>
          @endif
        </td>
      </tr>
      <tr>
        <th>Fecha</th>
        <td>{{ $obra[0]->fecha }}</td>
        <th>Otras Versiones</th>
        <td>
          @foreach($obra[1] as $key => $version)
            @if($version->id !== $obra[0]->id)
              <h4 class="versiones"><a href="{{route('obras.show', ['id' => $version->id])}}">{{$version->version}}</a></h4>
            @endif
          @endforeach
        </td>
      </tr>
      <tr>
        <th>Cliente</th>
        <td>{{ $obra[0]->cliente->nombre }}</td>
        <th>Acciones</th>
        <td>
          <button class="btn-sm btn-secondary" id="editarObra">Editar Obra</button>
          <button class="btn-sm btn-secondary" id="infHoras">Informe Horas</button>
          <button class="btn-sm btn-secondary" id="infCompras">Informe Compras</button>
        </td>
      </tr>
      <tr>
        <th>Identificador</th>
        <td>{{ $obra[0]->id }}</td>
      </tr>
    </table>

  </div>

</div>

  <div class="row mt-5">
    <div class="col">
      <h3>Parámetros de la Obra</h3>
      <table class="table table-sm table-striped">
        <thead>
          <tr>
            <th scope="col">Valor Montaje</th>
            <th scope="col">Porcentaje Montaje</th>
            <th scope="col">Valor Transporte</th>
            <th scope="col">Porcentaje Transporte</th>
            <th scope="col">Margen Estructural</th>
            <th scope="col">Margen Comercial</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{ $obra[0]->valor_montaje }}</td>
            <td>{{ $obra[0]->porcentaje_montaje }}</td>
            <td>{{ $obra[0]->valor_transporte }}</td>
            <td>{{ $obra[0]->porcentaje_transporte }}</td>
            <td>{{ $obra[0]->margen_estructural }}</td>
            <td>{{ $obra[0]->margen_comercial }}</td>
          </tr>
        </tbody>
      </table>
      <h3 class="mt-1">Desglose de Precios</h3>
      <table class="table table-sm table-striped">
        <thead>
          <tr>
            <th scope="col">Total Muebles</th>
            <th scope="col">Total Muebles con IVA</th>
            <th scope="col">Coste Montaje</th>
            <th scope="col">Coste Transporte</th>
            <th scope="col">Coste Base*</th>
            <th scope="col">Total Estructural</th>
            <th scope="col">Total Comercial</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{ $obra[0]->precio_total }}</td>
            <td>{{ $obra[0]->total_IVA }}</td>
            <td>{{ $obra[0]->total_montaje }}</td>
            <td>{{ $obra[0]->total_transporte }}</td>
            <td>{{ $obra[0]->coste_base }}</td>
            <td>{{ $obra[0]->total_estructural }}</td>
            <td>{{ $obra[0]->total_comercial }}</td>
          </tr>
        </tbody>
      </table>
      <p>* Coste base = Total Mueble IVA + Montaje + Transporte</p>
    </div>
  </div>

  <div class="row mt-3 p-3 mb-3 border">
    <div class="col">
      <h3>Muebles Presupuestados de la Obra</h3>
      <button class="btn btn-primary mb-3" id="addPresupuesto">Nuevo Mueble</button>
      <button class="btn btn-primary mb-3" id="addMuebleExistente">Añadir Muebles Existentes</button>

      <table id="presupuestoIndex">
        <thead>
          <tr>
            <th>#</th>
            <th>Concepto</th>
            <th>Precio und.</th>
            <th>Unidades</th>
            <th>Precio Coste</th>
            <th>Precio Total (Coste+Iva)</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach($obra[0]->presupuestos as $indice => $presupuesto)
            <tr>
              <td>{{$presupuesto->id}}</td>
              <td>{{$presupuesto->concepto}}</td>
              <td>{{$presupuesto->precio_total_unidad}}</td>
              <td>{{$presupuesto->unidades}}</td>
              <td>{{$presupuesto->precio_total}}</td>
              <td>{{$presupuesto->precio_con_iva  }}</td>
              <td>
                <a href="{{ route('presupuestos.show', ['id' => $presupuesto->id]) }}">
                  <button class="btn btn-outline-primary btn-sm">Ver</button>
                </a>
                <button class="btn btn-outline-primary btn-sm" onclick="getDuplicateForm({{$presupuesto->id}})">Duplicar</button>
                <button class="btn btn-outline-primary btn-sm" onclick="eliminarPresupuesto(this)">Borrar</button>
                <input type="hidden" value="{{route('presupuestos.destroy', ['id' => $presupuesto->id])}}">
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <!-- Modal form to add a post -->
  <div id="addObraModal" class="modal fade" role="dialog">
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

            <input type="hidden" class="form-control" name="obra_id" value="{{ $obra[0]->id }}">
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

  $.fn.dataTable.moment('DD/MM/YYYY');

  $('#presupuestoIndex').DataTable({
    dom: 'Bfrtip',
    buttons: [
        { extend: 'copyHtml5', title: 'Modifase - Presupuesto obra: {{$obra[0]->nombre}}', text: 'Copiar',  exportOptions: {columns: [0, 1, 2, 3, 4, 5]} },
        { extend: 'excelHtml5', title: 'Modifase - Presupuesto obra: {{$obra[0]->nombre}}',  exportOptions: {columns: [0, 1, 2, 3, 4, 5]} },
        { extend: 'csvHtml5', title: 'Modifase - Presupuesto obra: {{$obra[0]->nombre}}',  exportOptions: {columns: [0, 1, 2, 3, 4, 5]} },
        { extend: 'pdfHtml5', title: 'Modifase - Presupuesto obra: {{$obra[0]->nombre}}', exportOptions: {columns: [0, 1, 2, 3, 4, 5]}  }
    ],
    "language": {
          "url": "{{ asset('/js/datatable_spanish.json') }}"
      }
  });

  // EDITAR OBRA
  $("#editarObra").click(function(e){
    e.preventDefault();

    var form_action = "{{route('obras.create')}}";
    var id = "{{$obra[0]->id}}";

    $.ajax({
      dataType: 'json',
      type: 'GET',
      url: form_action,
      data: {id: id}
    }).done(function(data){
      $('#presupuestoIndex').parent().prepend(data);
      $('#addModal').modal('show');
    });
  })

  // Mostramos modal Muebles Existentes
  $("#addMuebleExistente").click(function(event){
    var form_action = "{{route('createExist', ['obra_id' => $obra[0]->id])}}";

    $.ajax({
      dataType: 'json',
      type: 'GET',
      url: form_action
    }).done(function(data){
      $('#addObraModal').parent().prepend(data);
      $('#existModal').modal('show');
    });
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
    $("#addObraModal").modal('show');
  });

});

$('#infHoras').click(function(event){
  event.preventDefault();
  var form_action = "{{ route('createInfHoras', ['id' => $obra[0]->id]) }}";

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
  var form_action = "{{ route('createInfCompras', ['id' => $obra[0]->id]) }}";

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
    $("#presupuestoIndex").parent().prepend(data);
    $("#duplicateModal").modal('show');
  });
}

function eliminarPresupuesto(elemento){
  var form_action = $(elemento).next().val();

  $.ajax({
    dataType: 'json',
    type: 'DELETE',
    url: form_action
  }).done(function(data){
    location.reload();
  });
}
</script>


@endsection
