@extends('layouts.app')

@section('title', 'Presupuesto Individual')

@section('content')

<div class="pt-5" id="presupuestoContainer">
  <h1>Presupuesto Individual</h1>
  <h3>Precio Total: {{$presupuesto->precio_final}}</h3>

  <form action="{{ action('PresupuestoController@update', ['presupuesto_id' => $presupuesto->id]) }}" method="PUT" id="updatePresupuesto">
    <div class="row mt-5 p-3 border">
      <div class="col-md-6">
        <div onclick="editar1('concepto')">
          <b>Concepto: </b>
          <input type="text" id="concepto" placeholder="Concepto" name="concepto" value="{{ $presupuesto->concepto }}" class="infoPresupuesto" onblur="guardar1(this.id)" disabled/>
        </div>
        <div onclick="editar1('unidades')">
          <b>Unidades: </b>
          <input type="text" id="unidades" placeholder="Unidades" name="unidades" value="{{ $presupuesto->unidades }} " class="infoPresupuesto" onblur="guardar1(this.id)" disabled/>
        </div>
        <div onclick="">
          <b>Obra: </b>
          <input type="text" id="obra_id" placeholder="Obra" name="obra" value="{{ $presupuesto->obra->id}} " disabled/>
        </div>
        <div onclick="">
          <b>Cliente: </b>
          <input type="text" id="cliente" placeholder="Cliente" name="cliente" value="{{ $presupuesto->obra->cliente->nombre }} " disabled/>
        </div>
        <div onclick="">
          <b>ID Presupuesto: </b>
          <input type="text" id="id" placeholder="Id Presupuesto" name="id" value="{{ $presupuesto->id }}"  disabled/>
        </div>

      </div>
      <div class="col-md-6">
        <div onclick="editar1('fecha')">
          <b>Fecha: </b>
          <input type="text" id="fecha" placeholder="Fecha" name="fecha" value="{{ $presupuesto->fecha }}" class="infoPresupuesto" onblur="guardar1(this.id)" disabled/>
        </div>
        <div onclick="editar1('estado')">
          <b>Estado: </b>
          <input type="text" id="estado" placeholder="Estado" name="estado" value="{{ $presupuesto->estado }} " class="infoPresupuesto" onblur="guardar1(this.id)" disabled/>
        </div>
        <div onclick="editar1('beneficio')">
          <b>Beneficio: </b>
          <input type="text" id="beneficio" placeholder="Beneficio" name="beneficio" value="{{ $presupuesto->beneficio }} " class="infoPresupuesto" onblur="guardar1(this.id)" disabled/>
        </div>
        <div onclick="editar1('caracteristicas')">
          <b>Características: </b>
          <input type="text" id="caracteristicas" placeholder="Caracteristicas" name="caracteristicas" value="{{ $presupuesto->caracteristicas }} " class="infoPresupuesto" onblur="guardar1(this.id)" disabled/>
        </div>

        <button type="button" id="editarP" class="btn btn-primary">Editar</button>
        <button type="button" id="guardarP" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </form>
  <div class="col-xs-12">
    <form action="{{ route('partes.store') }}" method="POST" id="addParteForm">
      <input type="text" placeholder="Concepto" name="concepto" id="addParteConcepto" />
      <button type="button" id="addParteButton" class="btn btn-primary">Añadir Parte</button>
    </form>
  </div>

  @foreach($presupuesto->partes as $key => $value)
  <div class="row mt-5 p-3 border">
    <?php print_r($value->proveedor); ?>
    <div class="col-xs-12 col-md-2">
      <button type="button" class="addMaterial btn btn-secondary" data-toggle="modal" data-target="#addMaterialModal">Añadir Material</button>
      <input type="hidden" value="{{ $value->id }}" id="parte_id">
    </div>
    <div class="col-xs-12 col-md-10">

        Concepto: {{ $value->nombre }}

        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Material</th>
              <th scope="col">Precio</th>
              <th scope="col">Proveedor</th>
            </tr>
          </thead>
          <tbody>

            @foreach($value->materiales as $mkey => $mvalue)

            <tr>
              <th scope="row">{{$mkey}}</th>
              <td>{{$mvalue->nombre}}</td>
              <td>{{$mvalue->precio}}</td>
              <td>{{$mvalue->pivot->proveedors_nombre}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>

    </div>
  </div>
  @endforeach
</div>

<!-- ================================ -->
<!-- == MODAL PARA AÑADIR MATERIAL == -->
<!-- ================================ -->

<div class="modal fade" id="addMaterialModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Añadir Material</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" id="añadir" class="btn btn-primary">Añadir</button>
      </div>
    </div>
  </div>
</div>

<!-- ================ -->
<!-- == FIN MODAL === -->
<!-- ================ -->


<script>
$(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  // Tabla Materiales
  $(".addMaterial").click(function(){
    var modalBody = $("#addMaterialModal .modal-body");
    var parte_id = $(this).next().val();

    $.get('/materiales/indexWithProveedores', function(data){
        $(modalBody).html(data);
        prepareDataTable(parte_id);
    });

  });

  // STORE Parte
  $('#addParteButton').click(function(event){
    event.preventDefault();

    var form_action = $("#addParteForm").attr("action");
    var concepto = $("#addParteConcepto").val();
    var presupuesto_id = {{ $presupuesto->id }};

    $.ajax({
        dataType: 'json',
        type:'POST',
        url: form_action,
        data:{nombre:concepto, presupuesto_id:presupuesto_id }
    }).done(function(data){
        location.reload();
    });
  });


  $('#editarP').click(function(event){
    var n = document.getElementsByClassName('infoPresupuesto');
    for(var i=0;i<n.length;i++){
       n[i].disabled = false;
    }
  });

  $('#guardarP').click(function(event){
    var form_action = $("#updatePresupuesto").attr("action");
    var concepto = $("#addParteConcepto").val();
    var presupuesto_id = {{ $presupuesto->id }};

    $.ajax({
        dataType: 'json',
        type:'PUT',
        url: form_action,
        data: $("#updatePresupuesto").serialize()
    }).done(function(data){
        location.reload();
    });

    var n = document.getElementsByClassName('infoPresupuesto');
    for(var i=0;i<n.length;i++){
       n[i].disabled = true;
    }


  });

});

function prepareDataTable(parte_id){
  var table = $('#selectMaterial').DataTable({
    "columnDefs": [
      { "visible": false, "searchable": false, "targets": 4 },
      { "visible": false, "searchable": false, "targets": 5 },
    ],
    "language": {
          "url": "{{ URL::to('/') }}/js/datatable_spanish.json"
      }
  });


  $('#selectMaterial tbody').on( 'click', 'tr', function () {
      $(this).toggleClass('selected');
  } );



  $('#añadir').click( function () {

    table.rows('.selected').every(function(rowIdx, tableLoop, rowLoop){
      var parteID = parte_id;
      var materialID = this.data()[4];
      var proveedorID = this.data()[5];
      $.ajax({
          type: 'POST',
          url: '/materiales/storeWithProveedor',
          data: {parte_id:parteID, material_id:materialID, proveedor_id: proveedorID}
      });
    });

    location.reload();

  });

}

</script>

<script>
function guardar1(id) {
  console.log("guarda");
  console.log(id);
  document.getElementById(id).disabled = true;
}
function editar1(id) {
  console.log("click");
  document.getElementById(id).disabled = false;
}
</script>
@endsection
