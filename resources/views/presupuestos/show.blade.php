@extends('layouts.app')

@section('title', 'Presupuesto Individual')

@section('content')
<?php
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

<div class="row" id="presupuestoContainer">

  <div class="row">
    <div class="col-xs-12">
      <h1>Presupuesto Individual</h1>
      <h3>Precio Total: {{$presupuesto->precio_total_unidad}}</h3>
    </div>
  </div>

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

        <button type="button" class="btn btn-primary editarP">Editar</button>
        <button type="button" class="btn btn-secondary cerrarP" data-dismiss="modal" hidden>Cerrar</button>
        <button type="button" class="btn btn-primary guardarP">Guardar</button>
      </div>
    </div>
  </form>

  <div class="col"><div class="row m-3">
    <div class="col-xs-12">
      <h3>Planos del presupuesto</h3>
      <form enctype="multipart/form-data" action="{{ route('planos.store') }}" method="POST">
        <input type="file" name="img[]" multiple>
        <input type="hidden" name="presupuesto_id" value="{{$presupuesto->id}}">
        {{ csrf_field() }}
        <input type="submit" class="btn btn-primary" value="Añadir">
      </form>
      @if(count($presupuesto->planos) >= 1)
      <button class="btn btn-primary" id="mostrarPlanos">Ver planos</button>
      <div class="gallery-container">
        @foreach($presupuesto->planos as $key => $plano)
          <div class="gallery-item">
            <a class="image-popup" href="{{ Storage::url("$plano->filename") }}">
              <img class="img-fluid" src="{{ Storage::url("$plano->filename") }}">
            </a>
          </div>
        @endforeach
      </div>
      @endif
    </div>
  </div>

  <div class="row mt-5 p-3 border border-bottom-0">

    <div class="col-xs-12">
      <h3>Partes del Mueble</h3>
      <p>
        A continuación podemos añadir partes para el mueble.
      </p>
      <form action="{{ route('partes.store') }}" method="POST" id="addParteForm">
        <input type="text" placeholder="Concepto" name="concepto" id="addParteConcepto" />
        <button type="button" id="addParteButton" class="btn btn-primary">Añadir Parte</button>
      </form>
    </div>
  </div></div>

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

   ?>
  <div class="row mt-5 p-3 border" id="parteDiv">

    <div class="row fullWidth">
      <h2 class="mr-5">{{ $value->nombre }}</h2>
      <div class="col">
        <button class="btn btn-primary float-right" id="borrarParte" onclick="deleteParte(this)">Borrar</button>
        <input type="hidden" value="{{ route('partes.destroy', ['id' => $value->id]) }}">
      </div>
    </div>
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
    <div class="row">

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
  </div>
  @endforeach
  <div class="row mt-5 p-5 border border-bottom-0">

    <div class="col-xs-12">
      <h3>Proveedores Externos</h3>
      <p>
        A continuación podemos añadir aquellos servicios o materiales que proceden de proveedores externos.
      </p>
      <form action="{{ route('material_externos.store') }}" method="POST" id="addMaterialExternoForm">
        <input type="text" placeholder="Concepto" name="concepto" id="addMaterialExternoConcepto" />
        <button type="button" id="addMaterialExternoButton" class="btn btn-primary">Añadir</button>
      </form>
    </div>

    <div class="row">

        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Índice</th>
              <th scope="col">Concepto</th>
              <th scope="col">Provedor Externo</th>
              <th scope="col">Unidades</th>
              <th scope="col">Ancho (mm)</th>
              <th scope="col">Alto (mm)</th>
              <th scope="col">M2</th>
              <th scope="col">Precio Und.</th>
              <th scope="col">Precio Total</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody>

            @foreach($presupuesto->material_externos as $key => $value)
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
                    <p>{{$value->unidades}}</p>
                    <input name="unidades" class="form-control small-input" type="hidden" value="{{$value->unidades}}">
                  </td>
                  <td class="editable">
                    <p>{{$value->ancho}}</p>
                    <input name="ancho" class="form-control small-input" type="hidden" value="{{$value->ancho}}">
                  </td>
                  <td class="editable">
                    <p>{{$value->alto}}</p>
                    <input name="alto" class="form-control small-input" type="hidden" value="{{$value->alto}}">
                  </td>
                  <td>{{$value->m2}}</td>
                  <td class="editable">
                    <p>{{$value->precio_unidad}}</p>
                    <input name="precio_unidad" class="form-control small-input" type="hidden" value="{{$value->precio_unidad}}">
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
            @endforeach
          </tbody>
        </table>

    </div>
  </div>



  <div class="row mt-5 p-3 border">
    <div class="col-md-12">
      <h2 class="mr-5">DESPERDICIO</h2>
      <p>
        Este porcentaje se aplica al precio total de todas las Maderas de este presupuesto.
        Y se suma automáticamente al total del presupuesto.
      </p>
      <input type="text" name="desperdicio" placeholder="Desperdicio (%)" value="{{ $presupuesto->desperdicio }}" />
      <button class="btn btn-primary" id="updateDesperdicio">Actualizar</button>
    </div>

  </div>

  <form action="{{ action('PresupuestoController@update', ['presupuesto_id' => $presupuesto->id]) }}" method="POST" id="updatePresupuesto">
    <div class="row mt-5 p-3 border">
      <div class="col-md-12">
        <h2 class="mr-5">MÁQUINAS</h2>
      </div>
      <div class="col-md-12">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Tiempo</th>
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

  <form action="{{ action('PresupuestoController@update', ['presupuesto_id' => $presupuesto->id]) }}" method="POST" id="updatePresupuesto">
    <div class="row mt-5 p-3 border">
      <div class="col-md-12">
        <h2 class="mr-5">MANO DE OBRA</h2>
      </div>
      <div class="col-md-12">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Operarios</th>
              <th scope="col">Horas por Operario</th>
              <th scope="col">Sección</th>
              <th scope="col">Operración</th>
              <th scope="col">Total Horas</th>
              <th scope="col">Precio Unidad</th>
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
                <input type="text" id="" placeholder="Total Horas" name="" value="{{ $presupuesto->maquinas_operarios * $presupuesto->maquinas_horas_operario }}" class="form-control small-input"  disabled/>
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

  <form action="{{ action('PresupuestoController@update', ['presupuesto_id' => $presupuesto->id]) }}" method="POST" id="updatePresupuesto">
    <div class="row mt-5 p-3 border">
      <div class="col-md-12">
        <h2 class="mr-5">COSTES ADICIONALES</h2>
      </div>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col"></th>
            <th scope="col">Precio Unidad</th>
            <th scope="col">Total</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>Desplazamiento</td>
            <td>
              <div onclick="editar1('desplazamiento_unidad')">
                <input type="text" id="desplazamiento_unidad" placeholder="Minutos" name="desplazamiento_unidad" value="{{ $presupuesto->desplazamiento_unidad }}" class="infoPresupuesto"  disabled/>
              </div>
            </td>
            <td>
                <input type="text" id="total_desplazamiento" placeholder="Operacion" name="total_desplazamiento" value="{{ $presupuesto->total_desplazamiento}}" class=""  disabled/>
            </td>
          </tr>
          <tr>
            <td>Transporte</td>
            <td>
              <div onclick="editar1('transporte_unidad')">
                <input type="text" id="transporte_unidad" placeholder="Minutos" name="transporte_unidad" value="{{ $presupuesto->transporte_unidad }}" class="infoPresupuesto"  disabled/>
              </div>
            </td>
            <td>
              <input type="text" id="total_transporte" placeholder="Operacion" name="total_transporte" value="{{ $presupuesto->total_transporte}}" class=""  disabled/>
            </td>
          </tr>
          <tr>
            <td>Imprevistos</td>
            <td>
              <div onclick="editar1('imprevistos_unidad')">
                <input type="text" id="imprevistos_unidad" placeholder="Minutos" name="imprevistos_unidad" value="{{ $presupuesto->imprevistos_unidad }}" class="infoPresupuesto"  disabled/>
              </div>
            </td>
            <td>
              <input type="text" id="total_imprevistos" placeholder="Operacion" name="total_imprevistos" value="{{ $presupuesto->total_imprevistos}}" class=""  disabled/>
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

</div> <!-- ROW id -->

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
    var presupuesto_id = {{ $presupuesto->id }};

    $.ajax({
        dataType: 'json',
        type:'POST',
        url: form_action,
        data:{concepto:concepto, presupuesto_id:presupuesto_id }
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

    var t_seccionadora = $("#t_seccionadora").val();
    var o_seccionadora = $("#o_seccionadora").val();
    var precio_t_seccionadora = $("#precio_t_seccionadora").val();
    var total_seccionadora = t_seccionadora * precio_t_seccionadora;
    var t_elaboracion = $("#t_elaboracion").val();
    var o_elaboracion = $("#o_elaboracion").val();
    var precio_t_elaboracion = $("#precio_t_elaboracion").val();
    var total_elaboracion = t_elaboracion * precio_t_elaboracion;
    var t_escuadradora = $("#t_escuadradora").val();
    var o_escuadradora = $("#o_escuadradora").val();
    var precio_t_escuadradora = $("#precio_t_escuadradora").val();
    var total_escuadradora = t_escuadradora * precio_t_escuadradora;
    var t_canteadora = $("#t_canteadora").val();
    var o_canteadora = $("#o_canteadora").val();
    var precio_t_canteadora = $("#precio_t_canteadora").val();
    var total_canteadora = t_canteadora * precio_t_canteadora;
    var t_punto = $("#t_punto").val();
    var o_punto = $("#o_punto").val();
    var precio_t_punto = $("#precio_t_punto").val();
    var total_punto = t_punto * precio_t_punto;
    var t_prensa = $("#t_prensa").val();
    var o_prensa = $("#o_prensa").val();
    var precio_t_prensa = $("#precio_t_prensa").val();
    var total_prensa = t_prensa * precio_t_prensa;



    var maquinas_operarios = $("#maquinas_operarios").val();
    var maquinas_horas_operario = $("#maquinas_horas_operario").val();
    var maquinas_operacion = $("#maquinas_operacion").val();
    var maquinas_precio_unidad = $("#maquinas_precio_unidad").val();
    var total_maquinas = (maquinas_operarios * maquinas_horas_operario) * maquinas_precio_unidad;
    var bancos_operarios = $("#bancos_operarios").val();
    var bancos_horas_operario = $("#bancos_horas_operario").val();
    var bancos_operacion = $("#bancos_operacion").val();
    var bancos_precio_unidad = $("#bancos_precio_unidad").val();
    var total_bancos = (bancos_operarios * bancos_horas_operario) * bancos_precio_unidad;
    var maquinas_oficial_1_operarios = $("#maquinas_oficial_1_operarios").val();
    var maquinas_oficial_1_horas_operario = $("#maquinas_oficial_1_horas_operario").val();
    var maquinas_oficial_1_operacion = $("#maquinas_oficial_1_operacion").val();
    var maquinas_oficial_1_precio_unidad = $("#maquinas_oficial_1_precio_unidad").val();
    var total_maquinas_oficial_1 = (maquinas_oficial_1_operarios * maquinas_oficial_1_horas_operario) * maquinas_oficial_1_precio_unidad;
    var producto_ter_1_operarios = $("#producto_ter_1_operarios").val();
    var producto_ter_1_horas_operario = $("#producto_ter_1_horas_operario").val();
    var producto_ter_1_operacion = $("#producto_ter_1_operacion").val();
    var producto_ter_1_precio_unidad = $("#producto_ter_1_precio_unidad").val();
    var total_producto_ter_1 = (producto_ter_1_operarios * producto_ter_1_horas_operario) * producto_ter_1_precio_unidad;
    var productor_ter_2_operarios = $("#productor_ter_2_operarios").val();
    var productor_ter_2_horas_operario = $("#productor_ter_2_horas_operario").val();
    var productor_ter_2_operacion = $("#productor_ter_2_operacion").val();
    var productor_ter_2_precio_unidad = $("#productor_ter_2_precio_unidad").val();
    var total_productor_ter_2 = (productor_ter_2_operarios * productor_ter_2_horas_operario) * productor_ter_2_precio_unidad;
    var oficial_1_operarios = $("#oficial_1_operarios").val();
    var oficial_1_horas_operario = $("#oficial_1_horas_operario").val();
    var oficial_1_operacion = $("#oficial_1_operacion").val();
    var oficial_1_precio_unidad = $("#oficial_1_precio_unidad").val();
    var total_oficial_1 = (oficial_1_operarios * oficial_1_horas_operario) * oficial_1_precio_unidad;
    var oficial_2_operarios = $("#oficial_2_operarios").val();
    var oficial_2_horas_operario = $("#oficial_2_horas_operario").val();
    var oficial_2_operacion = $("#oficial_2_operacion").val();
    var oficial_2_precio_unidad = $("#oficial_2_precio_unidad").val();
    var total_oficial_2 = (oficial_2_operarios * oficial_2_horas_operario) * oficial_2_precio_unidad;
    var ayudante_operarios = $("#ayudante_operarios").val();
    var ayudante_horas_operario = $("#ayudante_horas_operario").val();
    var ayudante_operacion = $("#ayudante_operacion").val();
    var ayudante_precio_unidad = $("#ayudante_precio_unidad").val();
    var total_ayudante = (ayudante_operarios * ayudante_horas_operario) * ayudante_precio_unidad;

    var desplazamiento_unidad = $("#desplazamiento_unidad").val();
    var total_desplazamiento = {{ $presupuesto->precio_total_unidad }} * (desplazamiento_unidad * 0.01);
    var transporte_unidad = $("#transporte_unidad").val();
    var total_transporte = {{ $presupuesto->precio_total_unidad }} * (transporte_unidad * 0.01);
    var imprevistos_unidad = $("#imprevistos_unidad").val();
    var total_imprevistos = {{ $presupuesto->precio_total_unidad }} * (imprevistos_unidad * 0.01);

    $.ajax({
        dataType: 'json',
        type:'PUT',
        url: form_action,
        data: {id: id, obra_id: obra_id, fecha: fecha,
          concepto: concepto, caracteristicas: caracteristicas,
          unidades: unidades, estado: estado, beneficio: beneficio,
          precio_final: precio_final,

          t_seccionadora: t_seccionadora, o_seccionadora: o_seccionadora, precio_t_seccionadora: precio_t_seccionadora, total_seccionadora: total_seccionadora,
          t_escuadradora: t_escuadradora, o_escuadradora: o_escuadradora, precio_t_escuadradora: precio_t_escuadradora, total_escuadradora: total_escuadradora,
          t_elaboracion: t_elaboracion, o_elaboracion: o_elaboracion, precio_t_elaboracion: precio_t_elaboracion, total_elaboracion: total_elaboracion,
          t_canteadora: t_canteadora, o_canteadora: o_canteadora, precio_t_canteadora: precio_t_canteadora, total_canteadora: total_canteadora,
          t_punto: t_punto, o_punto: o_punto, precio_t_punto: precio_t_punto, total_punto: total_punto,
          t_prensa: t_prensa, o_prensa: o_prensa, precio_t_prensa: precio_t_prensa, total_prensa: total_prensa,

          desplazamiento_unidad: desplazamiento_unidad, total_desplazamiento: total_desplazamiento,
          transporte_unidad: transporte_unidad, total_transporte: total_transporte,
          imprevistos_unidad: imprevistos_unidad, total_imprevistos: total_imprevistos,

          maquinas_operarios: maquinas_operarios, maquinas_horas_operario: maquinas_horas_operario,
          maquinas_operacion: maquinas_operacion, maquinas_precio_unidad: maquinas_precio_unidad, total_maquinas: total_maquinas,
          bancos_operarios: bancos_operarios, bancos_horas_operario: bancos_horas_operario, bancos_operacion: bancos_operacion,
          bancos_precio_unidad: bancos_precio_unidad, total_bancos: total_bancos,
          maquinas_oficial_1_operarios: maquinas_oficial_1_operarios, maquinas_oficial_1_horas_operario: maquinas_oficial_1_horas_operario,
          maquinas_oficial_1_operacion: maquinas_oficial_1_operacion, maquinas_oficial_1_precio_unidad: maquinas_oficial_1_precio_unidad,
          total_maquinas_oficial_1: total_maquinas_oficial_1, producto_ter_1_operarios: producto_ter_1_operarios,
          producto_ter_1_horas_operario: producto_ter_1_horas_operario, producto_ter_1_operacion: producto_ter_1_operacion,
          producto_ter_1_precio_unidad: producto_ter_1_precio_unidad, total_producto_ter_1: total_producto_ter_1,
          productor_ter_2_operarios: productor_ter_2_operarios, productor_ter_2_horas_operario: productor_ter_2_horas_operario,
          productor_ter_2_operacion: productor_ter_2_operacion, productor_ter_2_precio_unidad: productor_ter_2_precio_unidad,
          total_productor_ter_2: total_productor_ter_2, oficial_1_operarios: oficial_1_operarios,
          oficial_1_horas_operario: oficial_1_horas_operario, oficial_1_operacion: oficial_1_operacion, oficial_1_precio_unidad: oficial_1_precio_unidad,
          total_oficial_1: total_oficial_1, oficial_2_operarios: oficial_2_operarios, oficial_2_horas_operario: oficial_2_horas_operario,
          oficial_2_operacion: oficial_2_operacion, oficial_2_precio_unidad: oficial_2_precio_unidad, total_oficial_2: total_oficial_2,
          ayudante_operarios: ayudante_operarios, ayudante_horas_operario: ayudante_horas_operario, ayudante_operacion: ayudante_operacion,
          ayudante_precio_unidad: ayudante_precio_unidad, total_ayudante: total_ayudante },
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
  var alto = tr.find('input[name="alto"]').val();
  var ancho = tr.find('input[name="ancho"]').val();

  $.ajax({
      dataType: 'json',
      type:'POST',
      url: form_action,
      data: {id: materialparteID, unidades: unidades, alto: alto, ancho: ancho},
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
  var concepto = tr.find('input[name="concepto"]').val();
  var proveedor_externo = tr.find('input[name="proveedor_externo"]').val();
  var unidades = tr.find('input[name="unidades"]').val();
  var alto = tr.find('input[name="alto"]').val();
  var ancho = tr.find('input[name="ancho"]').val();
  var precio_unidad = tr.find('input[name="precio_unidad"]').val()
  var presupuesto_id = $("#id").val();


  $.ajax({
      dataType: 'json',
      type:'POST',
      url: form_action,
      data: {concepto: concepto, proveedor_externo: proveedor_externo, presupuesto_id: presupuesto_id,
              unidades: unidades, ancho: ancho, alto: alto, precio_unidad: precio_unidad},
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

      console.log("form: "+form_action);
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
