@extends('layouts.app')

@section('title', 'Presupuesto Individual')

@section('content')

<?php $location = 'presupuestos' ?>
<!-- ===========================
== TITULO Y PRECIO TOTAL ==
===========================  -->

<div class="row">
  <div class="col">
    <h1>{{ $presupuesto->concepto }}</h1>
    <h4>Total: {{$presupuesto->precio_con_iva }}€</h4>
    <a href="{{route('descargarPresupuesto', ['presupuesto_id' => $presupuesto->id]) }}"><button class="btn btn-primary">Descargar PDF</button></a>
  </div>
</div>

<!-- ======================
== INFO PRESUPUESTO ==
======================  -->

<form action="" method="POST" class="infoPre" id="updatePresupuesto">
  <div class="form-row mt-3 p-3 border">
    <div class="col-md-6">
      <div onclick="editar1('concepto')">
        <b>Concepto: </b>
        <input type="text" id="concepto" placeholder="Concepto" name="concepto" value="{{ $presupuesto->concepto }}" class="infoPresupuesto"  disabled/>
      </div>
      <div onclick="editar1('unidades')">
        <b>Unidades: </b>
        <input type="text" id="unidades" placeholder="Unidades" name="unidades" value="{{ $presupuesto->unidades }} " class="infoPresupuesto"  disabled/>
      </div>
      <div>
        <b>Obra: </b>
        <td> <a href="{{ route('obras.show', ['id' => $presupuesto->obra->id]) }}"> {{ $presupuesto->obra->nombre}}</a> </td>
      </div>
      <div>
        <b>Cliente: </b>
        <input type="text" id="cliente" placeholder="Cliente" name="cliente" value="{{ $presupuesto->obra->cliente->nombre }} " disabled/>
      </div>
      <div>
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
      <!-- @if ($presupuesto->uso_beneficio_global === 1)
      <div>
      <input type="checkbox" id="uso_beneficio_global_1" name="uso_beneficio_global" value="1" class="infoPresupuesto"  onclick="desmarcarCheckBox()" disabled checked>
      <input type="checkbox" id="uso_beneficio_global_0" name="uso_beneficio_global" value="0" class="infoPresupuesto"  onclick="desmarcarCheckBox()" disabled hidden>
      <b> Beneficio Global</b>
      </div>
      @else
      <div onclick="editar1('beneficio')">
      <b>Beneficio: </b>
      <input type="text" id="beneficio" placeholder="Beneficio" name="beneficio" value="{{ $beneficio }} " class="infoPresupuesto" disabled/>
      </div>
      <div>
      <input type="checkbox" id="uso_beneficio_global_1" name="uso_beneficio_global" value="1" class="infoPresupuesto"  onclick="desmarcarCheckBox()" disabled>
      <input type="checkbox" id="uso_beneficio_global_0" name="uso_beneficio_global" value="0" class="infoPresupuesto"  onclick="desmarcarCheckBox()" disabled checked hidden>
      <b> Beneficio Global </b>
      </div>
      @endif -->
      <div onclick="editar1('caracteristicas')">
        <b>Características: </b>
        <input type="text" id="caracteristicas" placeholder="Caracteristicas" name="caracteristicas" value="{{ $presupuesto->caracteristicas }} " class="infoPresupuesto"  disabled/>
      </div>

      <button type="button" class="btn btn-primary editarP">Editar</button>
      <button type="button" class="btn btn-secondary cerrarP" data-dismiss="modal" hidden>Cerrar</button>
      <button type="button" class="btn btn-primary guardarP">Guardar</button>
    </div>
  </div>
</form>

<!-- ======================
== PLANOS DEL MUEBLE ==
======================  -->

<div class="row mt-5 p-3 border">
  <div class="col">
    <h3>Planos del presupuesto</h3>

    <form enctype="multipart/form-data" action="{{ route('planos.store') }}" method="POST">
      <input type="file" name="img[]" multiple>
      <input type="hidden" name="presupuesto_id" value="{{$presupuesto->id}}">
      {{ csrf_field() }}
      <input type="submit" class="btn btn-primary" value="Añadir">
    </form>

    @if(count($presupuesto->planos) >= 1)
    <button class="btn btn-primary" id="mostrarPlanos">Ver planos</button>
    <div class="gallery-container mt-3">
      @foreach($presupuesto->planos as $key => $plano)
      <div class="gallery-item">
        <a class="image-popup" href="{{ Storage::url("$plano->filename") }}">
          <img class="img-fluid" src="{{ Storage::url("$plano->filename") }}">
        </a>
        <button class="btn-sm btn-primary fullWidth" onclick="deletePlano({{$plano->id}})">Borrar</button>
      </div>
      @endforeach
      <p class="mt-3">Pulse en un plano para verlo en grande.</p>
      <p>Si quiere borrar uno, pulse en el botón Borrar de debajo del plano en cuestión.</p>
    </div>
    @endif

  </div>
</div>

<!-- ==================
== PARTES DEL MUEBLE ==
=======================  -->

<div class="row mt-5 p-3 border border-bottom-0">

  <div class="col">
    <h3>Partes del Mueble</h3>
    <p>
      A continuación podemos añadir partes para el mueble.
    </p>
    <form action="{{ route('partes.store') }}" method="POST" id="addParteForm">
      <input type="text" placeholder="Concepto" name="concepto" id="addParteConcepto" />
      <button type="button" id="addParteButton" class="btn btn-primary">Añadir Parte</button>
    </form>
  </div>
</div>

@foreach($presupuesto->partes as $key => $value)

<?php
$tipoExiste = [
  'madera' => false,
  'electricidad' => false,
  'herraje' => false,
  'complemento' => false,
  'piezaCompuesta' => false,
  'embalaje' => false,
  'acabado' => false
];

$tiposMaterial = [
  'Maderas' => 'madera',
  'Electricidad' => 'electricidad',
  'Herrajes' => 'herraje',
  'Complementos' => 'complemento',
  'Piezas Compuestas' => 'piezaCompuesta',
  'Embalajes' => 'embalaje',
  'Acabados' => 'acabado'
];
?>

<div class="row mt-5 p-3 border" id="parteDiv">

  <h3 class="mr-2">{{ $value->nombre }}</h3>
  <button class="btn-sm btn-primary" id="borrarParte" onclick="deleteParte(this)">Borrar</button>
  <input type="hidden" value="{{ route('partes.destroy', ['id' => $value->id]) }}">

  <div class="row justify-content-center mb-4">
    <button type="button" class="addMaterial btn btn-secondary" data-toggle="modal" data-target="#addMaterialModal">Añadir Madera</button>
    <input type="hidden" value="{{route('indexWithProveedores', ['tipo' => 'madera']) }}" class="tipo_m">

    <button type="button" class="addMaterial btn btn-secondary" data-toggle="modal" data-target="#addMaterialModal">Añadir Electricidad</button>
    <input type="hidden" value="{{route('indexWithProveedores', ['tipo' => 'electricidad']) }}" class="tipo_m">

    <button type="button" class="addMaterial btn btn-secondary" data-toggle="modal" data-target="#addMaterialModal">Añadir Herraje</button>
    <input type="hidden" value="{{route('indexWithProveedores', ['tipo' => 'herraje']) }}" class="tipo_m">

    <button type="button" class="addMaterial btn btn-secondary" data-toggle="modal" data-target="#addMaterialModal">Añadir Complemento</button>
    <input type="hidden" value="{{route('indexWithProveedores', ['tipo' => 'complemento']) }}" class="tipo_m">

    <button type="button" class="addMaterial btn btn-secondary" data-toggle="modal" data-target="#addMaterialModal">Añadir Pieza Compuesta</button>
    <input type="hidden" value="{{route('indexWithProveedores', ['tipo' => 'piezaCompuesta']) }}" class="tipo_m">

    <button type="button" class="addMaterial btn btn-secondary" data-toggle="modal" data-target="#addMaterialModal">Añadir Embalaje</button>
    <input type="hidden" value="{{route('indexWithProveedores', ['tipo' => 'embalaje']) }}" class="tipo_m">

    <button type="button" class="addMaterial btn btn-secondary" data-toggle="modal" data-target="#addMaterialModal">Añadir Acabado</button>
    <input type="hidden" value="{{route('indexWithProveedores', ['tipo' => 'acabado']) }}" class="tipo_m">

    <input name="parte_id" type="hidden" value="{{ $value->id }}" id="parte_id">
  </div>

  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Uds.</th>
        <th scope="col">Material</th>
        <th scope="col">Largo (mm)</th>
        <th scope="col">Alto (mm)</th>
        <th scope="col">Ancho (mm)</th>
        <th scope="col">Tamaño</th>
        <th scope="col">Tamaño Total</th>
        <th scope="col">Proveedor</th>
        <th scope="col">Precio Und.</th>
        <th scope="col">Descuento</th>
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
        <td colspan="17" class="head_material_especial">
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
          <p>{{$mvalue->pivot->largo}}</p>
          <input name="largo" class="form-control small-input" type="hidden" value="{{$mvalue->pivot->largo}}">
        </td>
        <td class="editable">
          <p>{{$mvalue->pivot->alto}}</p>
          <input name="alto" class="form-control small-input" type="hidden" value="{{$mvalue->pivot->alto}}">
        </td>
        <td class="editable">
          <p>{{$mvalue->pivot->ancho}}</p>
          <input name="ancho" class="form-control small-input" type="hidden" value="{{$mvalue->pivot->ancho}}">
        </td>
        @if($mvalue->unidad == "m")
          <td>{{$mvalue->pivot->m}}</td>
          <td>{{$mvalue->pivot->total_m}}</td>
        @elif ($mvalue->unidad == "m2")
          <td>{{$mvalue->pivot->m2}}</td>
          <td>{{$mvalue->pivot->total_m2}}</td>
        @elif ($mvalue->unidad == "m3")
          <td>{{$mvalue->pivot->m3}}</td>
          <td>{{$mvalue->pivot->total_m3}}</td>
        @else
          @if($mvalue->pivot->m3 > 0)
            <td>{{$mvalue->pivot->m3}}</td>
            <td>{{$mvalue->pivot->total_m3}}</td>
          @elif($mvalue->pivot->m2 > 0)
            <td>{{$mvalue->pivot->m2}}</td>
            <td>{{$mvalue->pivot->total_m2}}</td>
          @else
            <td>{{$mvalue->pivot->m}}</td>
            <td>{{$mvalue->pivot->total_m}}</td>
          @endif
        @endif
        <td>{{$mvalue->pivot->proveedors_nombre}}</td>
        <td>{{$mvalue->precio}} € / {{$mvalue->unidad}}</td>
        <td>{{$mvalue->pivot->descuento}}</td>
        <td>{{$mvalue->pivot->precio_total}}</td>
        <td>

          <button type="button" class="btn btn-outline-primary btn-sm mb-1" onclick="editarMaterial({{ $mvalue->pivot->id }}, this)">Editar</button>
          <button type="button" class="btn btn-outline-primary btn-sm" onclick="eliminarMaterial({{ $mvalue->pivot->id }})">Borrar</button>
        </td>
      </tr>
      @endif
      @endforeach
      @endforeach
    </tbody>
  </table>
</div>
@endforeach

<!-- ======================
== PROVEEDORES EXTERNOS ==
======================  -->

<div class="row mt-5 p-3 border">

  <div class="col">
    <h3>Proveedores Externos</h3>
    <p>
      A continuación podemos añadir aquellos servicios o materiales que proceden de proveedores externos.
    </p>
    <form action="{{ route('material_externos.store') }}" method="POST" id="addMaterialExternoForm">
      <input type="text" placeholder="Concepto" name="concepto" id="addMaterialExternoConcepto" />
      <div>
        <input type="checkbox" id="uso_presupuesto_externo_1" name="uso_presupuesto_externo" class="uso_presupuesto_externo">
        <b>Importar sólo presupuesto externo, sin introducir el resto de datos</b>
      </div>
      <button type="button" id="addMaterialExternoButton" class="btn btn-primary">Añadir</button>
    </form>
  </div>

  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Concepto</th>
        <th scope="col">Provedor Externo</th>
        <th scope="col">Tipo Material</th>
        <th scope="col">Uds.</th>
        <th scope="col">Largo (mm)</th>
        <th scope="col">Alto (mm)</th>
        <th scope="col">Ancho (mm)</th>
        <th scope="col">Tamaño</th>
        <th scope="col">Tamaño Total</th>
        <th scope="col">Precio Und.</th>
        <th scope="col">Unidad</th>
        <th scope="col">Precio Total</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>

      @foreach($presupuesto->material_externos as $key => $value)
      @if($value->uso_presupuesto_externo == 0)
      <tr>
        <td>{{$value->id}}</td>
        <td class="editable">
          <p>{{$value->concepto}}</p>
          <input name="concepto" class="form-control small-input" type="hidden" value="{{$value->concepto}}">
        </td>
        <td class="editable">
          <p>{{$value->proveedor_externo}}</p>
          <input name="proveedor_externo" class="form-control small-input" type="hidden" value="{{$value->proveedor_externo}}">
        </td>
        <td class="editable">
          <p>{{$value->tipo_material}}</p>
          <input name="tipo_material" class="form-control small-input" type="hidden" value="{{$value->tipo_material}}">
        </td>
        <td class="editable">
          <p>{{$value->unidades}}</p>
          <input name="unidades" class="form-control small-input" type="hidden" value="{{$value->unidades}}">
        </td>
        <td class="editable">
          <p>{{$value->largo}}</p>
          <input name="largo" class="form-control small-input" type="hidden" value="{{$value->largo}}">
        </td>
        <td class="editable">
          <p>{{$value->alto}}</p>
          <input name="alto" class="form-control small-input" type="hidden" value="{{$value->alto}}">
        </td>
        <td class="editable">
          <p>{{$value->ancho}}</p>
          <input name="ancho" class="form-control small-input" type="hidden" value="{{$value->ancho}}">
        </td>
        @if($value->unidad == "m")
          <td>{{$value->m}}</td>
          <td>{{$value->total_m}}</td>
        @elif ($value->unidad == "m2")
          <td>{{$value->m2}}</td>
          <td>{{$value->total_m2}}</td>
        @elif ($value->unidad == "m3")
          <td>{{$value->m3}}</td>
          <td>{{$value->total_m3}}</td>
        @else
          @if($value->m3 > 0)
            <td>{{$value->m3}}</td>
            <td>{{$value->total_m3}}</td>
          @elif($value->m2 > 0)
            <td>{{$value->m2}}</td>
            <td>{{$value->total_m2}}</td>
          @else
            <td>{{$value->m}}</td>
            <td>{{$value->total_m}}</td>
          @endif
        @endif
        <td class="editable">
          <p>{{$value->precio_unidad}}</p>
          <input name="precio_unidad" class="form-control small-input" type="hidden" value="{{$value->precio_unidad}}">
        </td>
        <td class="editable">
          <p>{{$value->unidad}}</p>
          <input name="unidad" class="form-control small-input" type="hidden" value="{{$value->unidad}}">
        </td>
        <td>{{$value->precio_total}}</td>
        <td>
          <?php $rutaEliminarExterno = route('destroyExterno', ['id' => $value->id]); ?>

          <button type="button" class="btn btn-outline-primary btn-sm mb-1" onclick="editarMaterialExterno({{$value->id}},this)">Editar</button>
          <button type="button" class="btn btn-outline-primary btn-sm" onclick="eliminarMaterialExterno({{ $value->id }}, this)">Borrar</button>
          <input type="hidden" value="{{ route('editarExterno', ['id' => $value->id]) }}">
          <input type="hidden" value="{{ $value->id }}">
          <input type="hidden" value="{{ $rutaEliminarExterno }}">
        </td>
      </tr>
      @endif
      @endforeach
    </tbody>
  </table>

  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Índice</th>
        <th scope="col">Concepto</th>
        <th scope="col">Provedor Externo</th>
        <th scope="col">Número de Presupuesto</th>
        <th scope="col">Archivo</th>
        <th scope="col">Precio Total</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>

      @foreach($presupuesto->material_externos as $key => $value)
      @if($value->uso_presupuesto_externo == 1)
      <tr>
        <td>{{$value->id}}</td>
        <td class="editable">
          <p>{{$value->concepto}}</p>
          <input name="concepto" class="form-control small-input" type="hidden" value="{{$value->concepto}}">
        </td>
        <td class="editable">
          <p>{{$value->proveedor_externo}}</p>
          <input name="proveedor_externo" class="form-control small-input" type="hidden" value="{{$value->proveedor_externo}}">
        </td>
        <td class="editable">
          <p>{{$value->num_presupuesto}}</p>
          <input name="num_presupuesto" class="form-control small-input" type="hidden" value="{{$value->num_presupuesto}}">
        </td>
        <td>
          @if($value->archivo_presupuesto == "sin definir")
          <p>{{$value->archivo_presupuesto}}</p>
          @else
          <p><a href="{{$value->archivo_presupuesto}}" target="_blank">ver</a></p>
          @endif
        </td>
        <td  class="editable">
          <p>{{$value->precio_total}}</p>
          <input name="precio_total" class="form-control small-input" type="hidden" value="{{$value->precio_total}}">
        </td>
        <td>
          <?php $rutaEliminarExterno = route('destroyExterno', ['id' => $value->id]); ?>

          <button type="button" class="btn btn-outline-primary btn-sm mb-1" onclick="editarMaterialExterno({{$value->id}},this)">Editar</button>
          <button type="button" class="btn btn-outline-primary btn-sm" onclick="eliminarMaterialExterno({{ $value->id }}, this)">Borrar</button>
          <input type="hidden" value="{{ route('editarExterno', ['id' => $value->id]) }}">
          <input type="hidden" value="{{ $value->id }}">
          <input type="hidden" value="{{ $rutaEliminarExterno }}">
          <form enctype="multipart/form-data" action="{{ route('editarFacturaExterno') }}" method="POST">
            <input type="file" name="archivo_presupuesto">
            <input type="hidden" name="presupuesto_id" value="{{$presupuesto->id}}">
            <input type="hidden" name="id" value="{{$value->id}}">
            {{ csrf_field() }}
            <input type="submit" class="btn btn-primary" value="Añadir">
          </form>
        </td>
      </tr>
      @endif
      @endforeach
    </tbody>
  </table>

</div>

<!-- ============
== DESPERDICIO ==
=================  -->

<div class="row mt-5 p-3 border">
  <div class="col">
    <h3>DESPERDICIO</h3>
    <p>
      Este porcentaje se aplica al precio total de todas las Maderas de este presupuesto.
      Y se suma automáticamente al total del presupuesto.
    </p>
    <input type="text" name="desperdicio" placeholder="Desperdicio (%)" value="{{ $presupuesto->desperdicio }}" />
    <button class="btn btn-primary" id="updateDesperdicio">Actualizar</button>
  </div>

</div>

<!-- =========
== MÁQUINAS ==
==============  -->

<form action="" method="POST" class="infoPre" id="updatePresupuesto">
  <div class="row mt-5 p-3 border">
    <div class="col-md-12">
      <h3>MÁQUINAS</h3>
    </div>
    <div class="col-md-12">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Tiempo (minutos)</th>
            <th scope="col">Máquina Sección</th>
            <th scope="col">Operación</th>
            <th scope="col">Precio por Hora</th>
            <th scope="col">Total</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>
              <div onclick="editar1('t_seccionadora')">
                <input type="text" id="t_seccionadora" placeholder="Minutos" name="t_seccionadora" value="{{ $presupuesto->t_seccionadora }}" class="infoPresupuesto"  disabled/>
              </div>
            </td>
            <td>Seccionadora</td>
            <td>
              <div onclick="editar1('o_seccionadora')">
                <input type="text" id="o_seccionadora" placeholder="Operacion" name="o_seccionadora" value="{{ $presupuesto->o_seccionadora }}" class="infoPresupuesto"  disabled/>
              </div>
            </td>
            <td>
              <div onclick="editar1('precio_t_seccionadora')">
                <input type="text" id="precio_t_seccionadora" placeholder="Operacion" name="precio_t_seccionadora" value="{{ $presupuesto->precio_t_seccionadora }}" class="infoPresupuesto"  disabled/>
              </div>
            </td>
            <td>
              <div onclick="">
                <input type="text" id="total_seccionadora" placeholder="Operacion" name="total_seccionadora" value="{{ $presupuesto->total_seccionadora }}" class=""  disabled/>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div onclick="editar1('t_escuadradora')">
                <input type="text" id="t_escuadradora" placeholder="Minutos" name="t_escuadradora" value="{{ $presupuesto->t_escuadradora }}" class="infoPresupuesto"  disabled/>
              </div>
            </td>
            <td>Escuadradora/Tupi</td>
            <td>
              <div onclick="editar1('o_escuadradora')">
                <input type="text" id="o_escuadradora" placeholder="Operacion" name="o_escuadradora" value="{{ $presupuesto->o_escuadradora }}" class="infoPresupuesto"  disabled/>
              </div>
            </td>
            <td>
              <div onclick="editar1('precio_t_escuadradora')">
                <input type="text" id="precio_t_escuadradora" placeholder="Operacion" name="precio_t_escuadradora" value="{{ $presupuesto->precio_t_escuadradora }}" class="infoPresupuesto"  disabled/>
              </div>
            </td>
            <td>
              <div onclick="">
                <input type="text" id="total_escuadradora" placeholder="Operacion" name="total_escuadradora" value="{{ $presupuesto->total_escuadradora }}" class=""  disabled/>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div onclick="editar1('t_elaboracion')">
                <input type="text" id="t_elaboracion" placeholder="Minutos" name="t_elaboracion" value="{{ $presupuesto->t_elaboracion }}" class="infoPresupuesto"  disabled/>
              </div>
            </td>
            <td>Elaboración</td>
            <td>
              <div onclick="editar1('o_elaboracion')">
                <input type="text" id="o_elaboracion" placeholder="Operacion" name="o_elaboracion" value="{{ $presupuesto->o_elaboracion }}" class="infoPresupuesto"  disabled/>
              </div>
            </td>
            <td>
              <div onclick="editar1('precio_t_elaboracion')">
                <input type="text" id="precio_t_elaboracion" placeholder="Operacion" name="precio_t_elaboracion" value="{{ $presupuesto->precio_t_elaboracion }}" class="infoPresupuesto"  disabled/>
              </div>
            </td>
            <td>
              <div onclick="">
                <input type="text" id="total_elaboracion" placeholder="Operacion" name="total_elaboracion" value="{{ $presupuesto->total_elaboracion }}" class=""  disabled/>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div onclick="editar1('t_canteadora')">
                <input type="text" id="t_canteadora" placeholder="Minutos" name="t_canteadora" value="{{ $presupuesto->t_canteadora }}" class="infoPresupuesto"  disabled/>
              </div>
            </td>
            <td>Canteadora</td>
            <td>
              <div onclick="editar1('o_canteadora')">
                <input type="text" id="o_canteadora" placeholder="Operacion" name="o_canteadora" value="{{ $presupuesto->o_canteadora }}" class="infoPresupuesto"  disabled/>
              </div>
            </td>
            <td>
              <div onclick="editar1('precio_t_canteadora')">
                <input type="text" id="precio_t_canteadora" placeholder="Operacion" name="precio_t_canteadora" value="{{ $presupuesto->precio_t_canteadora }}" class="infoPresupuesto"  disabled/>
              </div>
            </td>
            <td>
              <div onclick="">
                <input type="text" id="total_canteadoratotal_canteadora" placeholder="Operacion" name="total_canteadora" value="{{ $presupuesto->total_canteadora }}" class=""  disabled/>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div onclick="editar1('t_punto')">
                <input type="text" id="t_punto" placeholder="Minutos" name="t_punto" value="{{ $presupuesto->t_punto }}" class="infoPresupuesto"  disabled/>
              </div>
            </td>
            <td>Punto</td>
            <td>
              <div onclick="editar1('o_punto')">
                <input type="text" id="o_punto" placeholder="Operacion" name="o_punto" value="{{ $presupuesto->o_punto }}" class="infoPresupuesto"  disabled/>
              </div>
            </td>
            <td>
              <div onclick="editar1('precio_t_punto')">
                <input type="text" id="precio_t_punto" placeholder="Operacion" name="precio_t_punto" value="{{ $presupuesto->precio_t_punto }}" class="infoPresupuesto"  disabled/>
              </div>
            </td>
            <td>
              <div onclick="">
                <input type="text" id="total_punto" placeholder="Operacion" name="total_punto" value="{{ $presupuesto->total_punto }}" class=""  disabled/>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div onclick="editar1('t_prensa')">
                <input type="text" id="t_prensa" placeholder="Minutos" name="t_prensa" value="{{ $presupuesto->t_prensa }}" class="infoPresupuesto"  disabled/>
              </div>
            </td>
            <td>Prensa</td>
            <td>
              <div onclick="editar1('o_prensa')">
                <input type="text" id="o_prensa" placeholder="Operacion" name="o_prensa" value="{{ $presupuesto->o_prensa }}" class="infoPresupuesto"  disabled/>
              </div>
            </td>
            <td>
              <div onclick="editar1('precio_t_prensa')">
                <input type="text" id="precio_t_prensa" placeholder="Operacion" name="precio_t_prensa" value="{{ $presupuesto->precio_t_prensa }}" class="infoPresupuesto"  disabled/>
              </div>
            </td>
            <td>
              <div onclick="">
                <input type="text" id="total_prensa" placeholder="Operacion" name="total_prensa" value="{{ $presupuesto->total_prensa }}" class=""  disabled/>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="col-md-12">
      <button type="button" class="btn btn-primary editarP">Editar</button>
      <button type="button" class="btn btn-secondary cerrarP" data-dismiss="modal" hidden>Cerrar</button>
      <button type="button" class="btn btn-primary guardarP">Guardar</button>
    </div>
  </div>
</form>

<!-- =============
== MANO DE OBRA ==
==================  -->

<form action="" method="POST" class="infoPre" id="updatePresupuesto">
  <div class="row mt-5 p-3 border">
    <div class="col">
      <h3>MANO DE OBRA</h3>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Operarios</th>
            <th scope="col">Tiempo por Operario (minutos)</th>
            <th scope="col">Sección</th>
            <th scope="col">Operración</th>
            <th scope="col">Total Horas</th>
            <th scope="col">Precio por Hora</th>
            <th scope="col">Total</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>
              <div onclick="editar1('maquinas_operarios')">
                <input type="text" id="maquinas_operarios" placeholder="Operarios" name="maquinas_operarios" value="{{ $presupuesto->maquinas_operarios }}" class="form-control small-input infoPresupuesto"  disabled/>
              </div>
            </td>
            <td>
              <div onclick="editar1('maquinas_horas_operario')">
                <input type="text" id="maquinas_horas_operario" placeholder="Horas por Operario" name="maquinas_horas_operario" value="{{ $presupuesto->maquinas_horas_operario }}" class="form-control small-input infoPresupuesto"  disabled/>
              </div>
            </td>
            <td>Máquinas</td>
            <td>
              <div onclick="editar1('maquinas_operacion')">
                <input type="text" id="maquinas_operacion" placeholder="Operación" name="maquinas_operacion" value="{{ $presupuesto->maquinas_operacion }}" class="form-control small-input infoPresupuesto"  disabled/>
              </div>
            </td>
            <td>
              <input type="text" id="" placeholder="Total Horas" name="" value="{{ $presupuesto->maquinas_operarios * ($presupuesto->maquinas_horas_operario/60) }}" class="form-control small-input"  disabled/>
            </td>
            <td>
              <div onclick="editar1('maquinas_precio_unidad')">
                <input type="text" id="maquinas_precio_unidad" placeholder="Precio UND" name="maquinas_precio_unidad" value="{{ $presupuesto->maquinas_precio_unidad }}" class="form-control small-input infoPresupuesto"  disabled/>
              </div>
            </td>
            <td>
              <input type="text" id="total_maquinas" placeholder="Total" name="" value="{{ $presupuesto->total_maquinas }}" class="form-control small-input"  disabled/>
            </td>
          </tr>
          <tr>
            <td>
              <div onclick="editar1('bancos_operarios')">
                <input type="text" id="bancos_operarios" placeholder="Operarios" name="bancos_operarios" value="{{ $presupuesto->bancos_operarios }}" class="form-control small-input infoPresupuesto"  disabled/>
              </div>
            </td>
            <td>
              <div onclick="editar1('bancos_horas_operario')">
                <input type="text" id="bancos_horas_operario" placeholder="Horas por Operario" name="bancos_horas_operario" value="{{ $presupuesto->bancos_horas_operario }}" class="form-control small-input infoPresupuesto"  disabled/>
              </div>
            </td>
            <td>Bancos Ayudante</td>
            <td>
              <div onclick="editar1('bancos_operacion')">
                <input type="text" id="bancos_operacion" placeholder="Operación" name="bancos_operacion" value="{{ $presupuesto->bancos_operacion }}" class="form-control small-input infoPresupuesto"  disabled/>
              </div>
            </td>
            <td>
              <input type="text" id="" placeholder="Total Horas" name="" value="{{ $presupuesto->bancos_operarios * $presupuesto->bancos_horas_operario }}" class="form-control small-input"  disabled/>
            </td>
            <td>
              <div onclick="editar1('bancos_precio_unidad')">
                <input type="text" id="bancos_precio_unidad" placeholder="Precio UND" name="bancos_precio_unidad" value="{{ $presupuesto->bancos_precio_unidad }}" class="form-control small-input infoPresupuesto"  disabled/>
              </div>
            </td>
            <td>
              <input type="text" id="total_bancos" placeholder="Total" name="" value="{{ $presupuesto->total_bancos }}" class="form-control small-input"  disabled/>
            </td>
          </tr>
          <tr>
            <td>
              <div onclick="editar1('maquinas_oficial_1_operarios')">
                <input type="text" id="maquinas_oficial_1_operarios" placeholder="Operarios" name="maquinas_oficial_1_operarios" value="{{ $presupuesto->maquinas_oficial_1_operarios }}" class="form-control small-input infoPresupuesto"  disabled/>
              </div>
            </td>
            <td>
              <div onclick="editar1('maquinas_oficial_1_horas_operario')">
                <input type="text" id="maquinas_oficial_1_horas_operario" placeholder="Horas por Operario" name="maquinas_oficial_1_horas_operario" value="{{ $presupuesto->maquinas_oficial_1_horas_operario }}" class="form-control small-input infoPresupuesto"  disabled/>
              </div>
            </td>
            <td>Máquinas oficial 1ª</td>
            <td>
              <div onclick="editar1('maquinas_oficial_1_operacion')">
                <input type="text" id="maquinas_oficial_1_operacion" placeholder="Operación" name="maquinas_oficial_1_operacion" value="{{ $presupuesto->maquinas_oficial_1_operacion }}" class="form-control small-input infoPresupuesto"  disabled/>
              </div>
            </td>
            <td>
              <input type="text" id="" placeholder="Total Horas" name="" value="{{$presupuesto->maquinas_oficial_1_operarios * $presupuesto->maquinas_oficial_1_horas_operario}}" class="form-control small-input"  disabled/>
            </td>
            <td>
              <div onclick="editar1('maquinas_oficial_1_precio_unidad')">
                <input type="text" id="maquinas_oficial_1_precio_unidad" placeholder="Precio UND" name="maquinas_oficial_1_precio_unidad" value="{{ $presupuesto->maquinas_oficial_1_precio_unidad }}" class="form-control small-input infoPresupuesto"  disabled/>
              </div>
            </td>
            <td>
              <input type="text" id="total_maquinas_oficial_1" placeholder="Total" name="" value="{{ $presupuesto->total_maquinas_oficial_1 }}" class="form-control small-input"  disabled/>
            </td>
          </tr>
          <tr>
            <td>
              <div onclick="editar1('producto_ter_1_operarios')">
                <input type="text" id="producto_ter_1_operarios" placeholder="Operarios" name="producto_ter_1_operarios" value="{{ $presupuesto->producto_ter_1_operarios }}" class="form-control small-input infoPresupuesto"  disabled/>
              </div>
            </td>
            <td>
              <div onclick="editar1('producto_ter_1_horas_operario')">
                <input type="text" id="producto_ter_1_horas_operario" placeholder="Horas por Operario" name="producto_ter_1_horas_operario" value="{{ $presupuesto->producto_ter_1_horas_operario }}" class="form-control small-input infoPresupuesto"  disabled/>
              </div>
            </td>
            <td>Producto Terminado</td>
            <td>
              <div onclick="editar1('producto_ter_1_operacion')">
                <input type="text" id="producto_ter_1_operacion" placeholder="Operación" name="producto_ter_1_operacion" value="{{ $presupuesto->producto_ter_1_operacion }}" class="form-control small-input infoPresupuesto"  disabled/>
              </div>
            </td>
            <td>
              <input type="text" id="" placeholder="Total Horas" name="" value="{{ $presupuesto->producto_ter_1_operarios * $presupuesto->producto_ter_1_horas_operario}}" class="form-control small-input"  disabled/>
            </td>
            <td>
              <div onclick="editar1('producto_ter_1_precio_unidad')">
                <input type="text" id="producto_ter_1_precio_unidad" placeholder="Precio UND" name="producto_ter_1_precio_unidad" value="{{ $presupuesto->producto_ter_1_precio_unidad }}" class="form-control small-input infoPresupuesto"  disabled/>
              </div>
            </td>
            <td>
              <input type="text" id="total_producto_ter_1" placeholder="Total" name="" value="{{ $presupuesto->total_producto_ter_1 }}" class="form-control small-input"  disabled/>
            </td>
          </tr>
          <tr>
            <td>
              <div onclick="editar1('productor_ter_2_operarios')">
                <input type="text" id="productor_ter_2_operarios" placeholder="Operarios" name="productor_ter_2_operarios" value="{{ $presupuesto->productor_ter_2_operarios }}" class="form-control small-input infoPresupuesto"  disabled/>
              </div>
            </td>
            <td>
              <div onclick="editar1('productor_ter_2_horas_operario')">
                <input type="text" id="productor_ter_2_horas_operario" placeholder="Horas por Operario" name="productor_ter_2_horas_operario" value="{{ $presupuesto->productor_ter_2_horas_operario }}" class="form-control small-input infoPresupuesto"  disabled/>
              </div>
            </td>
            <td>Producto Terminado</td>
            <td>
              <div onclick="editar1('productor_ter_2_operacion')">
                <input type="text" id="productor_ter_2_operacion" placeholder="Operación" name="productor_ter_2_operacion" value="{{ $presupuesto->productor_ter_2_operacion }}" class="form-control small-input infoPresupuesto"  disabled/>
              </div>
            </td>
            <td>
              <input type="text" id="" placeholder="Total Horas" name="" value="{{ $presupuesto->productor_ter_2_operarios * $presupuesto->productor_ter_2_horas_operario}}" class="form-control small-input"  disabled/>
            </td>
            <td>
              <div onclick="editar1('productor_ter_2_precio_unidad')">
                <input type="text" id="productor_ter_2_precio_unidad" placeholder="Precio UND" name="productor_ter_2_precio_unidad" value="{{ $presupuesto->productor_ter_2_precio_unidad }}" class="form-control small-input infoPresupuesto"  disabled/>
              </div>
            </td>
            <td>
              <input type="text" id="total_productor_ter_2" placeholder="Total" name="" value="{{ $presupuesto->total_productor_ter_2 }}" class="form-control small-input"  disabled/>
            </td>
          </tr>
          <tr>
            <td>
              <div onclick="editar1('oficial_1_operarios')">
                <input type="text" id="oficial_1_operarios" placeholder="Operarios" name="oficial_1_operarios" value="{{ $presupuesto->oficial_1_operarios }}" class="form-control small-input infoPresupuesto"  disabled/>
              </div>
            </td>
            <td>
              <div onclick="editar1('oficial_1_horas_operario')">
                <input type="text" id="oficial_1_horas_operario" placeholder="Horas por Operario" name="oficial_1_horas_operario" value="{{ $presupuesto->oficial_1_horas_operario }}" class="form-control small-input infoPresupuesto"  disabled/>
              </div>
            </td>
            <td>Oficial 1ª</td>
            <td>
              <div onclick="editar1('oficial_1_operacion')">
                <input type="text" id="oficial_1_operacion" placeholder="Operación" name="oficial_1_operacion" value="{{ $presupuesto->oficial_1_operacion }}" class="form-control small-input infoPresupuesto"  disabled/>
              </div>
            </td>
            <td>
              <input type="text" id="" placeholder="Total Horas" name="" value="{{ $presupuesto->oficial_1_operarios * $presupuesto->oficial_1_horas_operario}}" class="form-control small-input"  disabled/>
            </td>
            <td>
              <div onclick="editar1('oficial_1_precio_unidad')">
                <input type="text" id="oficial_1_precio_unidad" placeholder="Precio UND" name="oficial_1_precio_unidad" value="{{ $presupuesto->oficial_1_precio_unidad }}" class="form-control small-input infoPresupuesto"  disabled/>
              </div>
            </td>
            <td>
              <input type="text" id="total_oficial_1" placeholder="Total" name="" value="{{ $presupuesto->total_oficial_1 }}" class="form-control small-input"  disabled/>
            </td>
          </tr>
          <tr>
            <td>
              <div onclick="editar1('oficial_2_operarios')">
                <input type="text" id="oficial_2_operarios" placeholder="Operarios" name="oficial_2_operarios" value="{{ $presupuesto->oficial_2_operarios }}" class="form-control small-input infoPresupuesto"  disabled/>
              </div>
            </td>
            <td>
              <div onclick="editar1('oficial_2_horas_operario')">
                <input type="text" id="oficial_2_horas_operario" placeholder="Horas por Operario" name="oficial_2_horas_operario" value="{{ $presupuesto->oficial_2_horas_operario }}" class="form-control small-input infoPresupuesto"  disabled/>
              </div>
            </td>
            <td>Oficial 2ª</td>
            <td>
              <div onclick="editar1('oficial_2_operacion')">
                <input type="text" id="oficial_2_operacion" placeholder="Operación" name="oficial_2_operacion" value="{{ $presupuesto->oficial_2_operacion }}" class="form-control small-input infoPresupuesto"  disabled/>
              </div>
            </td>
            <td>
              <input type="text" id="" placeholder="Total Horas" name="" value="{{ $presupuesto->oficial_2_operarios * $presupuesto->oficial_2_horas_operario }}" class="form-control small-input"  disabled/>
            </td>
            <td>
              <div onclick="editar1('oficial_2_precio_unidad')">
                <input type="text" id="oficial_2_precio_unidad" placeholder="Precio UND" name="oficial_2_precio_unidad" value="{{ $presupuesto->oficial_2_precio_unidad }}" class="form-control small-input infoPresupuesto"  disabled/>
              </div>
            </td>
            <td>
              <input type="text" id="total_oficial_2" placeholder="Total" name="" value="{{ $presupuesto->total_oficial_2 }}" class="form-control small-input"  disabled/>
            </td>
          </tr>
          <tr>
            <td>
              <div onclick="editar1('ayudante_operarios')">
                <input type="text" id="ayudante_operarios" placeholder="Operarios" name="ayudante_operarios" value="{{ $presupuesto->ayudante_operarios }}" class="form-control small-input infoPresupuesto"  disabled/>
              </div>
            </td>
            <td>
              <div onclick="editar1('ayudante_horas_operario')">
                <input type="text" id="ayudante_horas_operario" placeholder="Horas por Operario" name="ayudante_horas_operario" value="{{ $presupuesto->ayudante_horas_operario }}" class="form-control small-input infoPresupuesto"  disabled/>
              </div>
            </td>
            <td>Ayudante</td>
            <td>
              <div onclick="editar1('ayudante_operacion')">
                <input type="text" id="ayudante_operacion" placeholder="Operación" name="ayudante_operacion" value="{{ $presupuesto->ayudante_operacion }}" class="form-control small-input infoPresupuesto"  disabled/>
              </div>
            </td>
            <td>
              <input type="text" id="" placeholder="Total Horas" name="" value="{{ $presupuesto->ayudante_operarios * $presupuesto->ayudante_horas_operario }}" class="form-control small-input"  disabled/>
            </td>
            <td>
              <div onclick="editar1('ayudante_precio_unidad')">
                <input type="text" id="ayudante_precio_unidad" placeholder="Precio UND" name="ayudante_precio_unidad" value="{{ $presupuesto->ayudante_precio_unidad }}" class="form-control small-input infoPresupuesto"  disabled/>
              </div>
            </td>
            <td>
              <input type="text" id="total_ayudante" placeholder="Total" name="" value="{{ $presupuesto->total_ayudante }}" class="form-control small-input"  disabled/>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="col-md-12">
      <button type="button" class="btn btn-primary editarP">Editar</button>
      <button type="button" class="btn btn-secondary cerrarP" data-dismiss="modal" hidden>Cerrar</button>
      <button type="button" class="btn btn-primary guardarP">Guardar</button>
    </div>
  </div>
</form>

<!-- ===================
== COSTES ADICIONALES ==
========================  -->

<form action="" method="POST"  class="infoPre" id="updatePresupuesto">
  <div class="row mt-5 p-3 border">
    <div class="col">
      <h3>COSTES ADICIONALES</h3>
    </div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col"></th>
          <th scope="col">Porcentaje</th>
          <th scope="col">Total</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Desplazamiento</td>
          <td>
            <div onclick="editar1('desplazamiento_unidad')">
              <input type="text" id="desplazamiento_unidad" placeholder="%" name="desplazamiento_unidad" value="{{ $presupuesto->desplazamiento_unidad }}" class="infoPresupuesto"  disabled/>
            </div>
          </td>
          <td>
            <input type="text" id="total_desplazamiento" placeholder="total" name="total_desplazamiento" value="{{ $presupuesto->total_desplazamiento}}" class=""  disabled/>
          </td>
        </tr>
        <tr>
          <td>Transporte</td>
          <td>
            <div onclick="editar1('transporte_unidad')">
              <input type="text" id="transporte_unidad" placeholder="%" name="transporte_unidad" value="{{ $presupuesto->transporte_unidad }}" class="infoPresupuesto"  disabled/>
            </div>
          </td>
          <td>
            <input type="text" id="total_transporte" placeholder="total" name="total_transporte" value="{{ $presupuesto->total_transporte}}" class=""  disabled/>
          </td>
        </tr>
        <tr>
          <td>Imprevistos</td>
          <td>
            <div onclick="editar1('imprevistos_unidad')">
              <input type="text" id="imprevistos_unidad" placeholder="%" name="imprevistos_unidad" value="{{ $presupuesto->imprevistos_unidad }}" class="infoPresupuesto"  disabled/>
            </div>
          </td>
          <td>
            <input type="text" id="total_imprevistos" placeholder="total" name="total_imprevistos" value="{{ $presupuesto->total_imprevistos}}" class=""  disabled/>
          </td>
        </tr>
        <tr>
          <td>IVA</td>
          <td>
            <div onclick="editar1('iva_unidad')">
              <input type="text" id="iva_unidad" placeholder="%" name="iva_unidad" value="{{ $presupuesto->iva_unidad }}" class="infoPresupuesto"  disabled/>
            </div>
          </td>
          <td>
            <input type="text" id="total_iva" placeholder="total" name="total_iva" value="{{ $presupuesto->total_iva}}" class=""  disabled/>
          </td>
        </tr>
      </tbody>
    </table>
    <div class="col-md-12">
      <button type="button" class="btn btn-primary editarP">Editar</button>
      <button type="button" class="btn btn-secondary cerrarP" data-dismiss="modal" hidden>Cerrar</button>
      <button type="button" class="btn btn-primary guardarP">Guardar</button>
    </div>
  </div>
</form>

<!-- ====================
== DESGLOSE DE PRECIOS ==
=========================  -->

<div class="row mt-5 p-3 border">
  <div class="col">
    <h3>Desglose de Precios</h3>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Total</th>
          <th scope="col">IVA</th>
          <th scope="col">Total con IVA</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>{{$presupuesto->precio_total}}</td>
          <td>{{$presupuesto->total_iva}}</td>
          <td>{{$presupuesto->precio_con_iva }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>


<!-- ========================================================================================
==================================== FIN VISTA PRINCIPAL ====================================
=============================================================================================  -->


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
    var parte_id = $(this).parent().find('#parte_id').val();

    var form_action = $(this).next().val();

    $.get(form_action, function(data){
        $(modalBody).html(data);
        prepareDataTable(parte_id);
    });

  });

  /*
  * Actualizar Desperdicio
  */
  $("#updateDesperdicio").click(function(event){
    event.preventDefault();
    var form_action = "{{ route('presupuestos.update', ['id' => $presupuesto->id]) }}";
    var desperdicio = $('input[name="desperdicio"]').val();

    $.ajax({
        dataType: 'json',
        type:'PUT',
        url: form_action,
        data: { desperdicio:desperdicio }
    }).done(function(data){
        location.reload();
    });
  });

  /*
  * Mostrar Planos
  * Al pulsar mostramos div gallery-container
  * Si volvemos a pulsar desaparece
  */
  $("#mostrarPlanos").click(function(event){
    $(".gallery-container").toggle();
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


  // STORE Material Externo
  $('#addMaterialExternoButton').click(function(event){
    event.preventDefault();

    var form_action = $("#addMaterialExternoForm").attr("action");
    var concepto = $("#addMaterialExternoConcepto").val();
    var uso_presupuesto_externo = 0;
    if(document.getElementsByName("uso_presupuesto_externo")[0].checked){
      uso_presupuesto_externo = 1;
    }
    var presupuesto_id = {{ $presupuesto->id }};

    $.ajax({
        dataType: 'json',
        type:'POST',
        url: form_action,
        data:{concepto:concepto, presupuesto_id:presupuesto_id, uso_presupuesto_externo:uso_presupuesto_externo }
    }).done(function(data){
        location.reload();
    });
  });


  $('.editarP').click(function(event){
    var n = document.getElementsByClassName('editarP');
    for(var i=0;i<n.length;i++){
       n[i].hidden = true;
    }
    var n = document.getElementsByClassName('cerrarP');
    for(var i=0;i<n.length;i++){
       n[i].hidden = false;
    }
    var n = document.getElementsByClassName('infoPresupuesto');
    for(var i=0;i<n.length;i++){
       n[i].disabled = false;
    }
  });

  $('.cerrarP').click(function(event){
    location.reload();
  });

  $('.guardarP').click(function(event){
    var form_action = "{{ route('presupuestos.update', ['id' => $presupuesto->id]) }}";
    var info_serialize = $(".infoPre").serialize();
    $.ajax({
        type:'PUT',
        url: form_action,
        data: info_serialize,
    }).done(function(data){
        location.reload();
    });

    var n = document.getElementsByClassName('editarP');
    for(var i=0;i<n.length;i++){
       n[i].hidden = false;
    }
    var n = document.getElementsByClassName('cerrarP');
    for(var i=0;i<n.length;i++){
       n[i].hidden = true;
    }
    var n = document.getElementsByClassName('infoPresupuesto');
    for(var i=0;i<n.length;i++){
       n[i].disabled = true;
    }


  });

});
function editarInfo(elemento){
  var form_action = $(elemento).next().val();

  $.ajax({
      dataType: 'json',
      type: 'DELETE',
      url: form_action
  }).done(function(data){
      location.reload();
  });

}

/*
* Eliminar Parte
*
*/
function deleteParte(elemento){
  var form_action = $(elemento).next().val();

  $.ajax({
      dataType: 'json',
      type: 'DELETE',
      url: form_action
  }).done(function(data){
      location.reload();
  });

}

/*
* Editar Material.
*
* Habilita los inputs para la edición.
* Cambiamos el botón para guardar y cambiamos su función onclick.
* @param materialparteID
* @param elemento -> this para el botón en el que ha pulsado el usuario
*/
function editarMaterial(materialparteID, elemento){
  $(elemento).html('Guardar');
  $(elemento).parent().parent().find('.editable input').prop("type", "text");
  $(elemento).parent().parent().find('.editable p').hide();
  $(elemento).attr("onclick", "guardarMaterialEditado("+materialparteID+", this)");
}

/*
* Editar Material Externo.
*
* Habilita los inputs para la edición.
* Cambiamos el botón para guardar y cambiamos su función onclick.
* @param materialID
* @param elemento -> this para el botón en el que ha pulsado el usuario
*/
function editarMaterialExterno(materialID, elemento){
  $(elemento).html('Guardar');
  $(elemento).parent().parent().find('.editable input').prop("type", "text");
  $(elemento).parent().parent().find('.editable p').hide();
  $(elemento).attr("onclick","guardarMaterialExterno("+materialID+", this)");
}


/*
* Guardar Material Editado
*
* Seleccionamos los datos y los enviamos
* @return Actualizamos la página
*/
function guardarMaterialEditado(materialparteID, elemento){
  var tr = $(elemento).parent().parent();
  var form_action = "{{ route('updateMaterialWithParte', ['presupuesto_id' => $presupuesto->id]) }}";
  var unidades = tr.find('input[name="unidades"]').val();
  var largo = tr.find('input[name="largo"]').val();
  var alto = tr.find('input[name="alto"]').val();
  var ancho = tr.find('input[name="ancho"]').val();

  $.ajax({
      dataType: 'json',
      type:'POST',
      url: form_action,
      data: {id: materialparteID, unidades: unidades, alto: alto, ancho: ancho, largo: largo},
  }).done(function(data){
      location.reload();
  });
}

/*
* Guardar Material Externo Editado
*
* Seleccionamos los datos y los enviamos
* @return Actualizamos la página
*/
function guardarMaterialExterno(materialID, elemento){
  var tr = $(elemento).parent().parent();
  var form_action = $(elemento).next().next().val();
  var presupuesto_id = $("#id").val();
  var concepto = tr.find('input[name="concepto"]').val();
  var proveedor_externo = tr.find('input[name="proveedor_externo"]').val();

  var tipo_material = tr.find('input[name="tipo_material"]').val();
  var unidades = tr.find('input[name="unidades"]').val();
  var largo = tr.find('input[name="largo"]').val();
  var alto = tr.find('input[name="alto"]').val();
  var ancho = tr.find('input[name="ancho"]').val();
  var precio_unidad = tr.find('input[name="precio_unidad"]').val()
  var unidad = tr.find('input[name="unidad"]').val();

  var num_presupuesto = tr.find('input[name="num_presupuesto"]').val();
  var archivo_presupuesto = tr.find('input[name="archivo_presupuesto"]').val();
  var precio_total = tr.find('input[name="precio_total"]').val();




  $.ajax({
      dataType: 'json',
      type:'POST',
      url: form_action,
      data: {concepto: concepto, proveedor_externo: proveedor_externo, tipo_material: tipo_material, presupuesto_id: presupuesto_id,
              unidades: unidades, largo: largo, ancho: ancho, alto: alto, unidad: unidad, precio_unidad: precio_unidad,
            num_presupuesto: num_presupuesto, archivo_presupuesto: archivo_presupuesto, precio_total: precio_total},
  }).done(function(data){
      location.reload();
  });
}

/*
* Eliminar Material
*/

function eliminarMaterial(material_parte_id){
var form_action = "{{ route('destroyMaterialWithParte', ['presupuesto_id' => $presupuesto->id]) }}";

  $.ajax({
      dataType: 'json',
      type:'POST',
      url: form_action,
      data: {id: material_parte_id},
  }).done(function(data){
      location.reload();
  });
}

/*
* Eliminar Material Externo
*/

function eliminarMaterialExterno(material_id, elemento){
var form_action = $(elemento).next().next().next().val();
var presupuesto_id = $("#id").val();

  $.ajax({
      dataType: 'json',
      type:'POST',
      url: form_action,
      data: {presupuesto_id: presupuesto_id},
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
          "url": "{{ asset('/js/datatable_spanish.json') }}"
      }
  });


  $('#selectMaterial tbody').on( 'click', 'tr', function () {
      $(this).toggleClass('selected');
  } );

  /*
  * Añadimos los material/proveedor seleccionados
  */
  $('#añadir').click( function () {
    var form_action = $(".modal-body input:first-child").val();

    table.rows('.selected').every(function(rowIdx, tableLoop, rowLoop){
      var parteID = parte_id;
      var materialID = this.data()[4];
      var proveedorID = this.data()[5];

      $.ajax({
          type: 'POST',
          url: form_action,
          data: {parte_id:parteID, material_id:materialID, proveedor_id: proveedorID}
      }).done(function(data){
          location.reload();
      });
    });

  });

}

/*
* Descargar PDF presupuesto
*/

function downloadPDF(){
  var form_action = "{{route('descargarPresupuesto', ['presupuesto_id' => $presupuesto->id]) }}";

  $.ajax({
    dataType: 'json',
    type: 'GET',
    url: form_action
  }).done(function(data){

  });
}

/*
* Borrar Plano
*/
function deletePlano(plano_id){
  var form_action = "{{route('planos.destroy', ['plano_id' => ":plano_id"]) }}";
  form_action = form_action.replace(':plano_id', plano_id);

  $.ajax({
    dataType: 'json',
    type: 'DELETE',
    url: form_action
  }).done(function(data){
    location.reload();
  });
}

function guardar1(id) {
  document.getElementById(id).disabled = true;
}

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

function desmarcarCheckBoxExterno(){
  if ($('#uso_presupuesto_externo_1').is(":checked")){
    $('#uso_presupuesto_externo_0').prop('checked',false);
  }else{
    $('#uso_presupuesto_externo_0').prop('checked',true);
  }

  if ($('#uso_presupuesto_externo_0').is(":checked")){
    $('#uso_presupuesto_externo_1').prop('checked',false);
  }else{
    $('#uso_presupuesto_externo_1').prop('checked',true);
  }
}
function editar1(id) {
  document.getElementById(id).disabled = false;
  var n = document.getElementsByClassName('editarP');
  for(var i=0;i<n.length;i++){
     n[i].hidden = true;
  }
  var n = document.getElementsByClassName('cerrarP');
  for(var i=0;i<n.length;i++){
     n[i].hidden = false;
  }
}
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<script>
$('.image-popup').magnificPopup({
  type: 'image',
  removalDelay: 300,
  mainClass: 'mfp-with-zoom',
  gallery:{
    enabled:true
  },
  zoom: {
    enabled: true, // By default it's false, so don't forget to enable it

    duration: 300, // duration of the effect, in milliseconds
    easing: 'ease-in-out', // CSS transition easing function

    // The "opener" function should return the element from which popup will be zoomed in
    // and to which popup will be scaled down
    // By defailt it looks for an image tag:
    opener: function(openerElement) {
    // openerElement is the element on which popup was initialized, in this case its <a> tag
    // you don't need to add "opener" option if this code matches your needs, it's defailt one.
    return openerElement.is('img') ? openerElement : openerElement.find('img');
    }
  }
});
</script>
@endsection
