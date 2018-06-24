<html>
<head>
  <title>Modifase - PDF</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">

  <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous">
  </script>

  <style>
  a{
    color: #dc3545 !important;
  }

  .btn-primary {
      color: #fff;
      background-color: #dc3545 !important;
      border-color: #dc3545 !important;
  }
  .btn-outline-primary{
    color: #dc3545;
    border-color: #dc3545 !important;
  }

  /* ========================= */
  /* == PRESUPUESTO - SHOW  ==*/
  /* ========================= */

  .row .fullWidth{
    width: 100%;
  }

  input:disabled{
    outline: none !important;
    background-color: white !important;
    border: 0 !important;
  }

  /* Botones de Añadir Material */
  .addMaterial{
    margin: 5px;
    font-size: 14px;
    width: 200px;
  }

  /* Cabecera de los Materiales */
  .head_material_especial{
    background-color: #dc3545 !important;
    text-align: center;
    color: white;
    padding: 2px !important;
  }

  /* Input de la tabla más pequeños */
  .editable .small-input{
    width: 65px;
  }

  /* Galería de planos */
  .gallery-container{
    display: none;
  }
  .gallery-item{
    max-width: 200px;
    display: inline-block;
  }

  /* ============================ */
  /* == FIN PRESUPUESTO - SHOW == */
  /* ============================ */

  </style>

</head>
<body>

  <div class="container-fluid">

    <!-- ===========================
    == TITULO Y PRECIO TOTAL ==
    ===========================  -->

    <div class="row">
      <div class="col">
        <h1>Presupuesto Individual</h1>
        @if ($presupuesto->uso_beneficio_global === 1)
        <?php $beneficio = $presupuesto->obra->beneficio;?>
        @else
        <?php $beneficio = $presupuesto->beneficio;?>
        @endif
        <h4>Total: {{$presupuesto->precio_total_unidad * (1 + ($beneficio * 0.01) )}}</h4>
      </div>
    </div>

    <!-- ======================
    == INFO PRESUPUESTO ==
    ======================  -->

    <div class="row mt-5 p-3 border">
      <div class="col-md-6">
        <div>
          <b>Concepto: </b>
          <input type="text" id="concepto" placeholder="Concepto" name="concepto" value="{{ $presupuesto->concepto }}" class="infoPresupuesto"  disabled/>
        </div>
        <div>
          <b>Unidades: </b>
          <input type="text" id="unidades" placeholder="Unidades" name="unidades" value="{{ $presupuesto->unidades }} " class="infoPresupuesto"  disabled/>
        </div>
        <div>
          <b>Obra: </b>
          <input type="text" id="obra_id" placeholder="Obra" name="obra" value="{{ $presupuesto->obra->id}} " disabled/>
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
        <div>
          <b>Fecha: </b>
          <input type="text" id="fecha" placeholder="Fecha" name="fecha" value="{{ $presupuesto->fecha }}" class="infoPresupuesto"  disabled/>
        </div>
        <div>
          <b>Estado: </b>
          <input type="text" id="estado" placeholder="Estado" name="estado" value="{{ $presupuesto->estado }} " class="infoPresupuesto"  disabled/>
        </div>
        <div>
          <b>Características: </b>
          <input type="text" id="caracteristicas" placeholder="Caracteristicas" name="caracteristicas" value="{{ $presupuesto->caracteristicas }} " class="infoPresupuesto"  disabled/>
        </div>
      </div>
    </div>

    <!-- ======================
    == PARTES DEL MUEBLE ==
    ======================  -->

    <div class="row mt-5 p-3 border border-bottom-0">
      <div class="col">
        <h3>Partes del Mueble</h3>
        <p>A continuación se detallan las partes del mueble y sus materiales.</p>
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

        <div class="col">
          <h2 class="mr-5">{{ $value->nombre }}</h2>

            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Índice</th>
                  <th scope="col">Unidades</th>
                  <th scope="col">Material</th>
                  <th scope="col">Largo (mm)</th>
                  <th scope="col">Alto (mm)</th>
                  <th scope="col">Ancho (mm)</th>
                  <th scope="col">M</th>
                  <th scope="col">Total M</th>
                  <th scope="col">M2</th>
                  <th scope="col">Total M2</th>
                  <th scope="col">M3</th>
                  <th scope="col">Total M3</th>
                  <th scope="col">Proveedor</th>
                  <th scope="col">Precio Und.</th>
                  <th scope="col">Descuento</th>
                  <th scope="col">Precio Total</th>
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
                      <td>{{$mvalue->pivot->unidades}}</td>
                      <td>{{$mvalue->nombre}}</td>
                      <td>{{$mvalue->pivot->largo}}</td>
                      <td>{{$mvalue->pivot->alto}}</td>
                      <td>{{$mvalue->pivot->ancho}}</td>
                      <td>{{$mvalue->pivot->m}}</td>
                      <td>{{$mvalue->pivot->total_m}}</td>
                      <td>{{$mvalue->pivot->m2}}</td>
                      <td>{{$mvalue->pivot->total_m2}}</td>
                      <td>{{$mvalue->pivot->m3}}</td>
                      <td>{{$mvalue->pivot->total_m3}}</td>
                      <td>{{$mvalue->pivot->proveedors_nombre}}</td>
                      <td>{{$mvalue->precio}} € / {{$mvalue->unidad}}</td>
                      <td>{{$mvalue->pivot->descuento}}</td>
                      <td>{{$mvalue->pivot->precio_total}}</td>
                    </tr>
                    @endif
                  @endforeach
                @endforeach
              </tbody>
            </table>

        </div>
      </div>
      @endforeach

    <!-- ======================
    == PROVEEDORES EXTERNOS ==
    ======================  -->

    <div class="row">

      <div class="col">
        <h3>Proveedores Externos</h3>
        <p>Servicios o materiales que proceden de proveedores externos.</p>

        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Índice</th>
              <th scope="col">Concepto</th>
              <th scope="col">Provedor Externo</th>
              <th scope="col">Material</th>
              <th scope="col">Unidades</th>
              <th scope="col">Largo (mm)</th>
              <th scope="col">Alto (mm)</th>
              <th scope="col">Ancho (mm)</th>
              <th scope="col">M</th>
              <th scope="col">Total M</th>
              <th scope="col">M2</th>
              <th scope="col">Total M2</th>
              <th scope="col">M3</th>
              <th scope="col">Total M3</th>
              <th scope="col">Precio Und.</th>
              <th scope="col">Unidad</th>
              <th scope="col">Precio Total</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach($presupuesto->material_externos as $key => $value)
            <tr>
              <td>{{$value->id}}</td>
              <td>{{$value->concepto}}</td>
              <td>{{$value->proveedor_externo}}</td>
              <td>{{$value->tipo_material}}</td>
              <td>{{$value->unidades}}</td>
              <td>{{$value->largo}}</td>
              <td>{{$value->alto}}</td>
              <td>{{$value->ancho}}</td>
              <td>{{$value->m}}</td>
              <td>{{$value->total_m}}</td>
              <td>{{$value->m2}}</td>
              <td>{{$value->total_m2}}</td>
              <td>{{$value->m3}}</td>
              <td>{{$value->total_m3}}</td>
              <td>{{$value->precio_unidad}}</td>
              <td>{{$value->unidad}}</td>
              <td>{{$value->precio_total}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>

      </div>
    </div>

    <!-- ============
    == DESPERDICIO ==
    =================  -->

    <div class="row mt-5 p-3 border">
      <div class="col">
        <h2 class="mr-5">DESPERDICIO</h2>
        <p>
          Este porcentaje se aplica al precio total de todas las Maderas de este presupuesto.
          Y se suma automáticamente al total del presupuesto.
        </p>
        <input type="text" name="desperdicio" placeholder="Desperdicio (%)" value="{{ $presupuesto->desperdicio }}" />
      </div>
    </div>

    <!-- =========
    == MÁQUINAS ==
    ==============  -->

      <div class="row mt-5 p-3 border">
        <div class="col-md-12">
          <h2 class="mr-5">MÁQUINAS</h2>

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
                  <div>
                    <input type="text" id="t_seccionadora" placeholder="Minutos" name="t_seccionadora" value="{{ $presupuesto->t_seccionadora }}" class="infoPresupuesto"  disabled/>
                  </div>
                </td>
                <td>Seccionadora</td>
                <td>
                  <div>
                    <input type="text" id="o_seccionadora" placeholder="Operacion" name="o_seccionadora" value="{{ $presupuesto->o_seccionadora }}" class="infoPresupuesto"  disabled/>
                  </div>
                </td>
                <td>
                  <div>
                    <input type="text" id="precio_t_seccionadora" placeholder="Operacion" name="precio_t_seccionadora" value="{{ $presupuesto->precio_t_seccionadora }}" class="infoPresupuesto"  disabled/>
                  </div>
                </td>
                <td>
                  <div>
                    <input type="text" id="total_seccionadora" placeholder="Operacion" name="total_seccionadora" value="{{ $presupuesto->total_seccionadora }}" class=""  disabled/>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div>
                    <input type="text" id="t_escuadradora" placeholder="Minutos" name="t_escuadradora" value="{{ $presupuesto->t_escuadradora }}" class="infoPresupuesto"  disabled/>
                  </div>
                </td>
                <td>Escuadradora/Tupi</td>
                <td>
                  <div>
                    <input type="text" id="o_escuadradora" placeholder="Operacion" name="o_escuadradora" value="{{ $presupuesto->o_escuadradora }}" class="infoPresupuesto"  disabled/>
                  </div>
                </td>
                <td>
                  <div>
                    <input type="text" id="precio_t_escuadradora" placeholder="Operacion" name="precio_t_escuadradora" value="{{ $presupuesto->precio_t_escuadradora }}" class="infoPresupuesto"  disabled/>
                  </div>
                </td>
                <td>
                  <div>
                    <input type="text" id="total_escuadradora" placeholder="Operacion" name="total_escuadradora" value="{{ $presupuesto->total_escuadradora }}" class=""  disabled/>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div>
                    <input type="text" id="t_elaboracion" placeholder="Minutos" name="t_elaboracion" value="{{ $presupuesto->t_elaboracion }}" class="infoPresupuesto"  disabled/>
                  </div>
                </td>
                <td>Elaboración</td>
                <td>
                  <div>
                    <input type="text" id="o_elaboracion" placeholder="Operacion" name="o_elaboracion" value="{{ $presupuesto->o_elaboracion }}" class="infoPresupuesto"  disabled/>
                  </div>
                </td>
                <td>
                  <div>
                    <input type="text" id="precio_t_elaboracion" placeholder="Operacion" name="precio_t_elaboracion" value="{{ $presupuesto->precio_t_elaboracion }}" class="infoPresupuesto"  disabled/>
                  </div>
                </td>
                <td>
                  <div>
                    <input type="text" id="total_elaboracion" placeholder="Operacion" name="total_elaboracion" value="{{ $presupuesto->total_elaboracion }}" class=""  disabled/>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div>
                    <input type="text" id="t_canteadora" placeholder="Minutos" name="t_canteadora" value="{{ $presupuesto->t_canteadora }}" class="infoPresupuesto"  disabled/>
                  </div>
                </td>
                <td>Canteadora</td>
                <td>
                  <div>
                    <input type="text" id="o_canteadora" placeholder="Operacion" name="o_canteadora" value="{{ $presupuesto->o_canteadora }}" class="infoPresupuesto"  disabled/>
                  </div>
                </td>
                <td>
                  <div>
                    <input type="text" id="precio_t_canteadora" placeholder="Operacion" name="precio_t_canteadora" value="{{ $presupuesto->precio_t_canteadora }}" class="infoPresupuesto"  disabled/>
                  </div>
                </td>
                <td>
                  <div>
                    <input type="text" id="total_canteadoratotal_canteadora" placeholder="Operacion" name="total_canteadora" value="{{ $presupuesto->total_canteadora }}" class=""  disabled/>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div>
                    <input type="text" id="t_punto" placeholder="Minutos" name="t_punto" value="{{ $presupuesto->t_punto }}" class="infoPresupuesto"  disabled/>
                  </div>
                </td>
                <td>Punto</td>
                <td>
                  <div>
                    <input type="text" id="o_punto" placeholder="Operacion" name="o_punto" value="{{ $presupuesto->o_punto }}" class="infoPresupuesto"  disabled/>
                  </div>
                </td>
                <td>
                  <div>
                    <input type="text" id="precio_t_punto" placeholder="Operacion" name="precio_t_punto" value="{{ $presupuesto->precio_t_punto }}" class="infoPresupuesto"  disabled/>
                  </div>
                </td>
                <td>
                  <div>
                    <input type="text" id="total_punto" placeholder="Operacion" name="total_punto" value="{{ $presupuesto->total_punto }}" class=""  disabled/>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div>
                    <input type="text" id="t_prensa" placeholder="Minutos" name="t_prensa" value="{{ $presupuesto->t_prensa }}" class="infoPresupuesto"  disabled/>
                  </div>
                </td>
                <td>Prensa</td>
                <td>
                  <div>
                    <input type="text" id="o_prensa" placeholder="Operacion" name="o_prensa" value="{{ $presupuesto->o_prensa }}" class="infoPresupuesto"  disabled/>
                  </div>
                </td>
                <td>
                  <div>
                    <input type="text" id="precio_t_prensa" placeholder="Operacion" name="precio_t_prensa" value="{{ $presupuesto->precio_t_prensa }}" class="infoPresupuesto"  disabled/>
                  </div>
                </td>
                <td>
                  <div>
                    <input type="text" id="total_prensa" placeholder="Operacion" name="total_prensa" value="{{ $presupuesto->total_prensa }}" class=""  disabled/>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

    <!-- =============
    == MANO DE OBRA ==
    ==================  -->

    <div class="row mt-5 p-3 border">
      <div class="col">
        <h2 class="mr-5">MANO DE OBRA</h2>

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
                <div>
                  <input type="text" id="maquinas_operarios" placeholder="Operarios" name="maquinas_operarios" value="{{ $presupuesto->maquinas_operarios }}" class="form-control small-input infoPresupuesto"  disabled/>
                </div>
              </td>
              <td>
                <div>
                  <input type="text" id="maquinas_horas_operario" placeholder="Horas por Operario" name="maquinas_horas_operario" value="{{ $presupuesto->maquinas_horas_operario }}" class="form-control small-input infoPresupuesto"  disabled/>
                </div>
              </td>
              <td>Máquinas</td>
              <td>
                <div>
                  <input type="text" id="maquinas_operacion" placeholder="Operación" name="maquinas_operacion" value="{{ $presupuesto->maquinas_operacion }}" class="form-control small-input infoPresupuesto"  disabled/>
                </div>
              </td>
              <td>
                <input type="text" id="" placeholder="Total Horas" name="" value="{{ $presupuesto->maquinas_operarios * ($presupuesto->maquinas_horas_operario/60) }}" class="form-control small-input"  disabled/>
              </td>
              <td>
                <div>
                  <input type="text" id="maquinas_precio_unidad" placeholder="Precio UND" name="maquinas_precio_unidad" value="{{ $presupuesto->maquinas_precio_unidad }}" class="form-control small-input infoPresupuesto"  disabled/>
                </div>
              </td>
              <td>
                <input type="text" id="total_maquinas" placeholder="Total" name="" value="{{ $presupuesto->total_maquinas }}" class="form-control small-input"  disabled/>
              </td>
            </tr>
            <tr>
              <td>
                <div>
                  <input type="text" id="bancos_operarios" placeholder="Operarios" name="bancos_operarios" value="{{ $presupuesto->bancos_operarios }}" class="form-control small-input infoPresupuesto"  disabled/>
                </div>
              </td>
              <td>
                <div>
                  <input type="text" id="bancos_horas_operario" placeholder="Horas por Operario" name="bancos_horas_operario" value="{{ $presupuesto->bancos_horas_operario }}" class="form-control small-input infoPresupuesto"  disabled/>
                </div>
              </td>
              <td>Bancos Ayudante</td>
              <td>
                <div>
                  <input type="text" id="bancos_operacion" placeholder="Operación" name="bancos_operacion" value="{{ $presupuesto->bancos_operacion }}" class="form-control small-input infoPresupuesto"  disabled/>
                </div>
              </td>
              <td>
                <input type="text" id="" placeholder="Total Horas" name="" value="{{ $presupuesto->bancos_operarios * $presupuesto->bancos_horas_operario }}" class="form-control small-input"  disabled/>
              </td>
              <td>
                <div>
                  <input type="text" id="bancos_precio_unidad" placeholder="Precio UND" name="bancos_precio_unidad" value="{{ $presupuesto->bancos_precio_unidad }}" class="form-control small-input infoPresupuesto"  disabled/>
                </div>
              </td>
              <td>
                <input type="text" id="total_bancos" placeholder="Total" name="" value="{{ $presupuesto->total_bancos }}" class="form-control small-input"  disabled/>
              </td>
            </tr>
            <tr>
              <td>
                <div>
                  <input type="text" id="maquinas_oficial_1_operarios" placeholder="Operarios" name="maquinas_oficial_1_operarios" value="{{ $presupuesto->maquinas_oficial_1_operarios }}" class="form-control small-input infoPresupuesto"  disabled/>
                </div>
              </td>
              <td>
                <div>
                  <input type="text" id="maquinas_oficial_1_horas_operario" placeholder="Horas por Operario" name="maquinas_oficial_1_horas_operario" value="{{ $presupuesto->maquinas_oficial_1_horas_operario }}" class="form-control small-input infoPresupuesto"  disabled/>
                </div>
              </td>
              <td>Máquinas oficial 1ª</td>
              <td>
                <div>
                  <input type="text" id="maquinas_oficial_1_operacion" placeholder="Operación" name="maquinas_oficial_1_operacion" value="{{ $presupuesto->maquinas_oficial_1_operacion }}" class="form-control small-input infoPresupuesto"  disabled/>
                </div>
              </td>
              <td>
                <input type="text" id="" placeholder="Total Horas" name="" value="{{$presupuesto->maquinas_oficial_1_operarios * $presupuesto->maquinas_oficial_1_horas_operario}}" class="form-control small-input"  disabled/>
              </td>
              <td>
                <div>
                  <input type="text" id="maquinas_oficial_1_precio_unidad" placeholder="Precio UND" name="maquinas_oficial_1_precio_unidad" value="{{ $presupuesto->maquinas_oficial_1_precio_unidad }}" class="form-control small-input infoPresupuesto"  disabled/>
                </div>
              </td>
              <td>
                <input type="text" id="total_maquinas_oficial_1" placeholder="Total" name="" value="{{ $presupuesto->total_maquinas_oficial_1 }}" class="form-control small-input"  disabled/>
              </td>
            </tr>
            <tr>
              <td>
                <div>
                  <input type="text" id="producto_ter_1_operarios" placeholder="Operarios" name="producto_ter_1_operarios" value="{{ $presupuesto->producto_ter_1_operarios }}" class="form-control small-input infoPresupuesto"  disabled/>
                </div>
              </td>
              <td>
                <div>
                  <input type="text" id="producto_ter_1_horas_operario" placeholder="Horas por Operario" name="producto_ter_1_horas_operario" value="{{ $presupuesto->producto_ter_1_horas_operario }}" class="form-control small-input infoPresupuesto"  disabled/>
                </div>
              </td>
              <td>Producto Terminado</td>
              <td>
                <div>
                  <input type="text" id="producto_ter_1_operacion" placeholder="Operación" name="producto_ter_1_operacion" value="{{ $presupuesto->producto_ter_1_operacion }}" class="form-control small-input infoPresupuesto"  disabled/>
                </div>
              </td>
              <td>
                <input type="text" id="" placeholder="Total Horas" name="" value="{{ $presupuesto->producto_ter_1_operarios * $presupuesto->producto_ter_1_horas_operario}}" class="form-control small-input"  disabled/>
              </td>
              <td>
                <div>
                  <input type="text" id="producto_ter_1_precio_unidad" placeholder="Precio UND" name="producto_ter_1_precio_unidad" value="{{ $presupuesto->producto_ter_1_precio_unidad }}" class="form-control small-input infoPresupuesto"  disabled/>
                </div>
              </td>
              <td>
                <input type="text" id="total_producto_ter_1" placeholder="Total" name="" value="{{ $presupuesto->total_producto_ter_1 }}" class="form-control small-input"  disabled/>
              </td>
            </tr>
            <tr>
              <td>
                <div>
                  <input type="text" id="productor_ter_2_operarios" placeholder="Operarios" name="productor_ter_2_operarios" value="{{ $presupuesto->productor_ter_2_operarios }}" class="form-control small-input infoPresupuesto"  disabled/>
                </div>
              </td>
              <td>
                <div>
                  <input type="text" id="productor_ter_2_horas_operario" placeholder="Horas por Operario" name="productor_ter_2_horas_operario" value="{{ $presupuesto->productor_ter_2_horas_operario }}" class="form-control small-input infoPresupuesto"  disabled/>
                </div>
              </td>
              <td>Producto Terminado</td>
              <td>
                <div>
                  <input type="text" id="productor_ter_2_operacion" placeholder="Operación" name="productor_ter_2_operacion" value="{{ $presupuesto->productor_ter_2_operacion }}" class="form-control small-input infoPresupuesto"  disabled/>
                </div>
              </td>
              <td>
                <input type="text" id="" placeholder="Total Horas" name="" value="{{ $presupuesto->productor_ter_2_operarios * $presupuesto->productor_ter_2_horas_operario}}" class="form-control small-input"  disabled/>
              </td>
              <td>
                <div>
                  <input type="text" id="productor_ter_2_precio_unidad" placeholder="Precio UND" name="productor_ter_2_precio_unidad" value="{{ $presupuesto->productor_ter_2_precio_unidad }}" class="form-control small-input infoPresupuesto"  disabled/>
                </div>
              </td>
              <td>
                <input type="text" id="total_productor_ter_2" placeholder="Total" name="" value="{{ $presupuesto->total_productor_ter_2 }}" class="form-control small-input"  disabled/>
              </td>
            </tr>
            <tr>
              <td>
                <div>
                  <input type="text" id="oficial_1_operarios" placeholder="Operarios" name="oficial_1_operarios" value="{{ $presupuesto->oficial_1_operarios }}" class="form-control small-input infoPresupuesto"  disabled/>
                </div>
              </td>
              <td>
                <div>
                  <input type="text" id="oficial_1_horas_operario" placeholder="Horas por Operario" name="oficial_1_horas_operario" value="{{ $presupuesto->oficial_1_horas_operario }}" class="form-control small-input infoPresupuesto"  disabled/>
                </div>
              </td>
              <td>Oficial 1ª</td>
              <td>
                <div>
                  <input type="text" id="oficial_1_operacion" placeholder="Operación" name="oficial_1_operacion" value="{{ $presupuesto->oficial_1_operacion }}" class="form-control small-input infoPresupuesto"  disabled/>
                </div>
              </td>
              <td>
                <input type="text" id="" placeholder="Total Horas" name="" value="{{ $presupuesto->oficial_1_operarios * $presupuesto->oficial_1_horas_operario}}" class="form-control small-input"  disabled/>
              </td>
              <td>
                <div>
                  <input type="text" id="oficial_1_precio_unidad" placeholder="Precio UND" name="oficial_1_precio_unidad" value="{{ $presupuesto->oficial_1_precio_unidad }}" class="form-control small-input infoPresupuesto"  disabled/>
                </div>
              </td>
              <td>
                <input type="text" id="total_oficial_1" placeholder="Total" name="" value="{{ $presupuesto->total_oficial_1 }}" class="form-control small-input"  disabled/>
              </td>
            </tr>
            <tr>
              <td>
                <div>
                  <input type="text" id="oficial_2_operarios" placeholder="Operarios" name="oficial_2_operarios" value="{{ $presupuesto->oficial_2_operarios }}" class="form-control small-input infoPresupuesto"  disabled/>
                </div>
              </td>
              <td>
                <div>
                  <input type="text" id="oficial_2_horas_operario" placeholder="Horas por Operario" name="oficial_2_horas_operario" value="{{ $presupuesto->oficial_2_horas_operario }}" class="form-control small-input infoPresupuesto"  disabled/>
                </div>
              </td>
              <td>Oficial 2ª</td>
              <td>
                <div>
                  <input type="text" id="oficial_2_operacion" placeholder="Operación" name="oficial_2_operacion" value="{{ $presupuesto->oficial_2_operacion }}" class="form-control small-input infoPresupuesto"  disabled/>
                </div>
              </td>
              <td>
                <input type="text" id="" placeholder="Total Horas" name="" value="{{ $presupuesto->oficial_2_operarios * $presupuesto->oficial_2_horas_operario }}" class="form-control small-input"  disabled/>
              </td>
              <td>
                <div>
                  <input type="text" id="oficial_2_precio_unidad" placeholder="Precio UND" name="oficial_2_precio_unidad" value="{{ $presupuesto->oficial_2_precio_unidad }}" class="form-control small-input infoPresupuesto"  disabled/>
                </div>
              </td>
              <td>
                <input type="text" id="total_oficial_2" placeholder="Total" name="" value="{{ $presupuesto->total_oficial_2 }}" class="form-control small-input"  disabled/>
              </td>
            </tr>
            <tr>
              <td>
                <div>
                  <input type="text" id="ayudante_operarios" placeholder="Operarios" name="ayudante_operarios" value="{{ $presupuesto->ayudante_operarios }}" class="form-control small-input infoPresupuesto"  disabled/>
                </div>
              </td>
              <td>
                <div>
                  <input type="text" id="ayudante_horas_operario" placeholder="Horas por Operario" name="ayudante_horas_operario" value="{{ $presupuesto->ayudante_horas_operario }}" class="form-control small-input infoPresupuesto"  disabled/>
                </div>
              </td>
              <td>Ayudante</td>
              <td>
                <div>
                  <input type="text" id="ayudante_operacion" placeholder="Operación" name="ayudante_operacion" value="{{ $presupuesto->ayudante_operacion }}" class="form-control small-input infoPresupuesto"  disabled/>
                </div>
              </td>
              <td>
                <input type="text" id="" placeholder="Total Horas" name="" value="{{ $presupuesto->ayudante_operarios * $presupuesto->ayudante_horas_operario }}" class="form-control small-input"  disabled/>
              </td>
              <td>
                <div>
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
    </div>

    <!-- ===================
    == COSTES ADICIONALES ==
    ========================  -->


    <div class="row mt-5 p-3 border">
      <div class="col">
        <h2 class="mr-5">COSTES ADICIONALES</h2>
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
                <div>
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
                <div>
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
                <div>
                  <input type="text" id="imprevistos_unidad" placeholder="Minutos" name="imprevistos_unidad" value="{{ $presupuesto->imprevistos_unidad }}" class="infoPresupuesto"  disabled/>
                </div>
              </td>
              <td>
                <input type="text" id="total_imprevistos" placeholder="Operacion" name="total_imprevistos" value="{{ $presupuesto->total_imprevistos}}" class=""  disabled/>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- =======
    == PRECIO FINAL ==
    ============  -->

    <div class="row">
      <div class="col">
        <h4>Precio: {{$presupuesto->precio_total_unidad}}</h4>
        <h4>Beneficio: {{$presupuesto->precio_total_unidad * ($beneficio * 0.01) }}</h4>
        <h4>Total: {{$presupuesto->precio_total_unidad * (1 + ($beneficio * 0.01) )}}</h4>
      </div>
    </div>

    <!-- =======
    == PLANOS ==
    ============  -->


  </div>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
</body>
</html>
