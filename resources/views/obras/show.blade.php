@extends('layouts.app')

@section('title', 'Obra Individual')

@section('content')


  <h1>{{ $obra->cliente->nombre }}</h1>
  <h4>{{ $obra->fecha }}</h4>
  <p>Identificador de obra: {{ $obra->id }}</p>
  <p>Precio total de obra: {{ $obra->precio_total }}</p>
  <button class="btn btn-primary" id="addPresupuesto">Nuevo Presupuesto</button>

  <div class="row mt-5 p-3 border">
    <table id="presupuestoIndex">
      <thead>
        <tr>
          <th>#</th>
          <th>Concepto</th>
          <th>Precio und.</th>
          <th>Unidades</th>
          <th>Precio Total</th>
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
            <td>
              <a href="{{ route('presupuestos.show', ['id' => $presupuesto->id]) }}">
                <button class="btn btn-outline-primary btn-sm">Ver</button>
              </a>
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

  // Enviamos formulario

  $("#addPresupuestoButton").click(function(event){
    event.preventDefault();
    var form_action = "{{route('presupuestos.store')}}";
    var formulario = $("#addPresupuestoForm").serialize();
console.log(formulario);
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
</script>


@endsection
