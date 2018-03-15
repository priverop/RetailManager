@extends('layouts.app')

@section('title', 'Presupuesto Individual')

@section('content')
<?php
  $tiposMaterial = array('Madera' => 'normal', 'Electricidad' => 'electricidad', 'Herrajes' => 'herrajes',
            'Complementos' => 'complementos', 'Piezas Compuestas' => 'piezasCompuestas',
            'Embalaje' => 'embalaje', 'Acabados' => 'acabados');

  $tipoExiste = ['normal' => false, 'electricidad' => false, 'herrajes' => false,
            'complementos' => false, 'piezasCompuestas' => false,
            'embalaje' => false, 'acabados' => false];
?>

<div class="pt-5" id="presupuestoContainer">
  <h1>Presupuesto Individual</h1>
  <h3>Precio Total: {{$presupuesto->precio_final}}</h3>

  <form action="{{ action('PresupuestoController@update', ['presupuesto_id' => $presupuesto->id]) }}" method="POST" id="updatePresupuesto">
    <div class="row mt-5 p-3 border">
      <div class="col-md-6">
        <div onclick="editar1('concepto')">
          <b>Concepto: </b>
          <input type="text" id="concepto" placeholder="Concepto" name="concepto" value="{{ $presupuesto->concepto }}" class="infoPresupuesto"  disabled/>
        </div>
        <div onclick="editar1('unidades')">
          <b>Unidades: </b>
          <input type="text" id="unidades" placeholder="Unidades" name="unidades" value="{{ $presupuesto->unidades }} " class="infoPresupuesto"  disabled/>
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
          <input type="text" id="fecha" placeholder="Fecha" name="fecha" value="{{ $presupuesto->fecha }}" class="infoPresupuesto"  disabled/>
        </div>
        <div onclick="editar1('estado')">
          <b>Estado: </b>
          <input type="text" id="estado" placeholder="Estado" name="estado" value="{{ $presupuesto->estado }} " class="infoPresupuesto"  disabled/>
        </div>
        <div onclick="editar1('beneficio')">
          <b>Beneficio: </b>
          <input type="text" id="beneficio" placeholder="Beneficio" name="beneficio" value="{{ $presupuesto->beneficio }} " class="infoPresupuesto"  disabled/>
        </div>
        <div onclick="editar1('caracteristicas')">
          <b>Características: </b>
          <input type="text" id="caracteristicas" placeholder="Caracteristicas" name="caracteristicas" value="{{ $presupuesto->caracteristicas }} " class="infoPresupuesto"  disabled/>
        </div>

        <button type="button" id="editarP" class="btn btn-primary">Editar</button>
        <button type="button" id="cerrarP" class="btn btn-secondary" data-dismiss="modal" hidden>Cerrar</button>
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

    <div class="col-xs-12 col-md-2">
      <button type="button" class="addMaterial btn btn-secondary" data-toggle="modal" data-target="#addMaterialModal">Añadir Material</button>
      <input type="hidden" value="normal" class="tipo_m">

      <button type="button" class="addMaterial btn btn-secondary" data-toggle="modal" data-target="#addMaterialModal">Añadir Electricidad</button>
      <input type="hidden" value="electricidad" class="tipo_m">

      <button type="button" class="addMaterial btn btn-secondary" data-toggle="modal" data-target="#addMaterialModal">Añadir Herrajes</button>
      <input type="hidden" value="herrajes" class="tipo_m">

      <button type="button" class="addMaterial btn btn-secondary" data-toggle="modal" data-target="#addMaterialModal">Añadir Complementos</button>
      <input type="hidden" value="complementos" class="tipo_m">

      <button type="button" class="addMaterial btn btn-secondary" data-toggle="modal" data-target="#addMaterialModal">Añadir Piezas Compuestas</button>
      <input type="hidden" value="piezasCompuestas" class="tipo_m">

      <button type="button" class="addMaterial btn btn-secondary" data-toggle="modal" data-target="#addMaterialModal">Añadir Embalaje</button>
      <input type="hidden" value="embalaje" class="tipo_m">

      <button type="button" class="addMaterial btn btn-secondary" data-toggle="modal" data-target="#addMaterialModal">Añadir Acabados</button>
      <input type="hidden" value="acabados" class="tipo_m">

      <input type="hidden" value="{{ $value->id }}" id="parte_id">
    </div>
    <div class="col-xs-12 col-md-10">

        Concepto: {{ $value->nombre }}

        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Índice</th>
              <th scope="col">Unidades</th>
              <th scope="col">Material</th>
              <th scope="col">Ancho (mm)</th>
              <th scope="col">Alto (mm)</th>
              <th scope="col">M2</th>
              <th scope="col">Total M2</th>
              <th scope="col">Proveedor</th>
              <th scope="col">Precio Und.</th>
              <th scope="col">Precio Total</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody>

            @foreach($tiposMaterial as $title => $type)
              @foreach($value->materiales as $mkey => $mvalue)
                @if($mvalue->tipo === $type)
                  @if(!$tipoExiste[$type])
                  <tr>
                    <td colspan="11" class="head_material_especial">
                      {{$title}}
                    </td>
                  </tr>
                  <?php $tipoExiste[$type] = true; ?>
                  @endif
                <tr>
                  <td>{{$mkey}}</td>
                  <td class="editable">
                    <p>{{$mvalue->pivot->unidades}}</p>
                    <input name="unidades" class="form-control small-input" type="hidden" value="{{$mvalue->pivot->unidades}}">
                  </td>
                  <td>{{$mvalue->nombre}}</td>
                  <td class="editable">
                    <p>{{$mvalue->pivot->ancho}}</p>
                    <input name="ancho" class="form-control small-input" type="hidden" value="{{$mvalue->pivot->ancho}}">
                  </td>
                  <td class="editable">
                    <p>{{$mvalue->pivot->alto}}</p>
                    <input name="alto" class="form-control small-input" type="hidden" value="{{$mvalue->pivot->alto}}">
                  </td>
                  <td>{{$mvalue->pivot->m2}}</td>
                  <td>{{$mvalue->pivot->total_m2}}</td>
                  <td>{{$mvalue->pivot->proveedors_nombre}}</td>
                  <td>{{$mvalue->precio}}</td>
                  <td>{{$mvalue->pivot->precio_total}}</td>
                  <td>
                    <button type="button" class="btn btn-primary" onclick="editarMaterial({{$mvalue->id}}, this)">Editar</button>
                    <button type="button" class="btn btn-primary" onclick="eliminarMaterial({{$mvalue->id}})">Borrar</button>
                    <input type="hidden" value="{{ route('updateMaterialWithParte', ['id' => $mvalue->id]) }}">
                    <input type="hidden" value="{{ $value->id }}">
                  </td>
                </tr>
                @endif
              @endforeach
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

  /*
  * Añadir Material - Modal
  */
  $(".addMaterial").click(function(){
    var modalBody = $("#addMaterialModal .modal-body");
    var parte_id = $("#parte_id").val();
    var tipo = $(this).next().val();
    console.log(tipo);

    $.get('/materiales/indexWithProveedores/'+tipo, function(data){
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
    document.getElementById("editarP").hidden = true;
    document.getElementById("cerrarP").hidden = false;
    var n = document.getElementsByClassName('infoPresupuesto');
    for(var i=0;i<n.length;i++){
       n[i].disabled = false;
    }
  });

  $('#cerrarP').click(function(event){
    location.reload();
  });

  $('#guardarP').click(function(event){
    var form_action = $("#updatePresupuesto").attr("action");
    console.log($("#id").val());
    var id = $("#id").val();
    var obra_id = $("#obra_id").val();
    var fecha = $("#fecha").val();
    var concepto = $("#concepto").val();
    var caracteristicas = $("#caracteristicas").val();
    var unidades = $("#unidades").val();
    var estado = $("#estado").val();
    var beneficio = $("#beneficio").val();
    var precio_final = $("#precio_final").val();
    //$("#updatePresupuesto").serialize()
    $.ajax({
        dataType: 'json',
        type:'PUT',
        url: form_action,
        data: {id: id, obra_id: obra_id, fecha: fecha, concepto: concepto, caracteristicas: caracteristicas, unidades: unidades, estado: estado, beneficio: beneficio, precio_final: precio_final},
    }).done(function(data){
        location.reload();
    });

    document.getElementById("editarP").hidden = false;
    document.getElementById("cerrarP").hidden = true;
    var n = document.getElementsByClassName('infoPresupuesto');
    for(var i=0;i<n.length;i++){
       n[i].disabled = true;
    }


  });

});

/*
* Editar Material.
* Habilita los inputs para la edición.
* Cambiamos el botón para guardar y cambiamos su función onclick.
* @input materialID
* @input elemento -> this para el botón en el que ha pulsado el usuario
*/
function editarMaterial(materialID, elemento){
  $(elemento).html('Guardar');
  $(elemento).parent().parent().find('.editable input').prop("type", "text");
  $(elemento).parent().parent().find('.editable p').hide();
  $(elemento).attr("onclick","guardarMaterialEditado("+materialID+", this)");
}

/*
* Guardar Material Editado
*
*/
function guardarMaterialEditado(materialID, elemento){
  var tr = $(elemento).parent().parent();
  var form_action = $(elemento).next().next().val();
  var parteID = $(elemento).next().next().next().val();
  var unidades = tr.find('input[name="unidades"]').val();
  var alto = tr.find('input[name="alto"]').val();
  var ancho = tr.find('input[name="ancho"]').val();

  $.ajax({
      dataType: 'json',
      type:'POST',
      url: form_action,
      data: {parte: parteID, unidades: unidades, alto: alto, ancho: ancho},
  }).done(function(data){
      location.reload();
  });
}

/*
* Generamos DataTable
* Ocultamos columnas con IDs
* Añadimos el idioma
*/

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
  document.getElementById("editarP").hidden = true;
  document.getElementById("cerrarP").hidden = false;
}
</script>
@endsection
