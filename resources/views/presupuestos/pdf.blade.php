<html>
<head>
  <title>Modifase - PDF</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous">
  </script>

  <style>
  a{
    color: #dc3545 !important;
  }

  body, th, td{
    font-size: 0.8em;
  }

  h3{
    font-size: 1.25em;
    text-transform: uppercase;
  }

  .logo{
    max-width: 120px;
  }

  .header div{
    display: inline-block;
    height: 56px;
    vertical-align: middle;
  }
  .header > div:first-child{

  }
  .header > div:nth-child(2){
    margin-right: 100px;
  }
  .header > div:nth-child(3){
    margin-right: 230px;
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

    <div class="row mb-3">
      <div class="col header">
        <div>
          <img src="{{ public_path('images/logo_grande.png') }}" class="logo">
        </div>
        <div>Presupuesto Individual</div>
        <div>{{date("d-m-Y")}}</div>
      </div>
    </div>

    <!-- =================
    == INFO PRESUPUESTO ==
    ======================  -->

    <div class="row mt-3">
      <table class="table table-sm table-striped">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Concepto</th>
            <th scope="col">Unidades</th>
            <th scope="col">Obra</th>
            <th scope="col">Cliente</th>
            <th scope="col">Fecha</th>
            <th scope="col">Estado</th>
            <th scope="col">Características</th>
            <th scope="col">Desperdicio</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{ $presupuesto->id}}</td>
            <td>{{ $presupuesto->concepto }}</td>
            <td>{{ $presupuesto->unidades }}</td>
            <td>{{ $presupuesto->obra->nombre}}</td>
            <td>{{ $presupuesto->obra->cliente->nombre }}</td>
            <td>{{ $presupuesto->fecha }}</td>
            <td>{{ $presupuesto->estado }}</td>
            <td>{{ $presupuesto->caracteristicas }}</td>
            <td>{{ $presupuesto->desperdicio }}%</td>
          </tr>
        </tbody>
      </table>
    </div>

  <!-- ==================
  == PARTES DEL MUEBLE ==
  =======================  -->

  <div class="row mt-3">
    <div class="col">
      <h3>Partes del Mueble</h3>
      <p>A continuación se detallan las partes del mueble y sus materiales.</p>
    </div>
  </div>

  <!-- =========
  == MÁQUINAS ==
  ==============  -->

    <div class="row mt-3">
      <div class="col">
        <h3>MÁQUINAS</h3>

        <table class="table table-striped table-sm">
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
              <td>{{ $presupuesto->t_seccionadora }}</td>
              <td>Seccionadora</td>
              <td>{{ $presupuesto->o_seccionadora }}</td>
              <td>{{ $presupuesto->precio_t_seccionadora }}</td>
              <td>{{ $presupuesto->total_seccionadora }}</td>
            </tr>
            <tr>
              <td>{{ $presupuesto->t_escuadradora }}</td>
              <td>Escuadradora/Tupi</td>
              <td>{{ $presupuesto->o_escuadradora }}</td>
              <td>{{ $presupuesto->precio_t_escuadradora }}</td>
              <td>{{ $presupuesto->total_escuadradora }}</td>
            </tr>
            <tr>
              <td>{{ $presupuesto->t_elaboracion }}</td>
              <td>Elaboración</td>
              <td>{{ $presupuesto->o_elaboracion }}</td>
              <td>{{ $presupuesto->precio_t_elaboracion }}</td>
              <td>{{ $presupuesto->total_elaboracion }}</td>
            </tr>
            <tr>
              <td>{{ $presupuesto->t_canteadora }}</td>
              <td>Canteadora</td>
              <td>{{ $presupuesto->o_canteadora }}</td>
              <td>{{ $presupuesto->precio_t_canteadora }}</td>
              <td>{{ $presupuesto->total_canteadora }}</td>
            </tr>
            <tr>
              <td>{{ $presupuesto->t_punto }}</td>
              <td>Punto</td>
              <td>{{ $presupuesto->o_punto }}</td>
              <td>{{ $presupuesto->precio_t_punto }}</td>
              <td>{{ $presupuesto->total_punto }}</td>
            </tr>
            <tr>
              <td>{{ $presupuesto->t_prensa }}</td>
              <td>Prensa</td>
              <td>{{ $presupuesto->o_prensa }}</td>
              <td>{{ $presupuesto->precio_t_prensa }}</td>
              <td>{{ $presupuesto->total_prensa }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- =============
    == MANO DE OBRA ==
    ==================  -->

    <div class="row mt-3">
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
              <td>{{ $presupuesto->maquinas_operarios }}</td>
              <td>{{ $presupuesto->maquinas_horas_operario }}</td>
              <td>Máquinas</td>
              <td>{{ $presupuesto->maquinas_operacion }}</td>
              <td>{{ $presupuesto->maquinas_operarios * ($presupuesto->maquinas_horas_operario/60) }}</td>
              <td>{{ $presupuesto->maquinas_precio_unidad }}</td>
              <td>{{ $presupuesto->total_maquinas }}</td>
            </tr>
            <tr>
              <td>{{ $presupuesto->bancos_operarios }}</td>
              <td>{{ $presupuesto->bancos_horas_operario }}</td>
              <td>Bancos Ayudante</td>
              <td>{{ $presupuesto->bancos_operacion }}</td>
              <td>{{ $presupuesto->bancos_operarios * $presupuesto->bancos_horas_operario }}</td>
              <td>{{ $presupuesto->bancos_precio_unidad }}</td>
              <td>{{ $presupuesto->total_bancos }}</td>
            </tr>
            <tr>
              <td>{{ $presupuesto->maquinas_oficial_1_operarios }}</td>
              <td>{{ $presupuesto->maquinas_oficial_1_horas_operario }}</td>
              <td>Máquinas oficial 1ª</td>
              <td>{{ $presupuesto->maquinas_oficial_1_operacion }}</td>
              <td>{{$presupuesto->maquinas_oficial_1_operarios * $presupuesto->maquinas_oficial_1_horas_operario}}</td>
              <td>{{ $presupuesto->maquinas_oficial_1_precio_unidad }}</td>
              <td>{{ $presupuesto->total_maquinas_oficial_1 }}</td>
            </tr>
            <tr>
              <td>{{ $presupuesto->producto_ter_1_operarios }}</td>
              <td>{{ $presupuesto->producto_ter_1_horas_operario }}</td>
              <td>Producto Terminado</td>
              <td>{{ $presupuesto->producto_ter_1_operacion }}</td>
              <td>{{ $presupuesto->producto_ter_1_operarios * $presupuesto->producto_ter_1_horas_operario}}</td>
              <td>{{ $presupuesto->producto_ter_1_precio_unidad }}</td>
              <td>{{ $presupuesto->total_producto_ter_1 }}</td>
            </tr>
            <tr>
              <td>{{ $presupuesto->productor_ter_2_operarios }}</td>
              <td>{{ $presupuesto->productor_ter_2_horas_operario }}</td>
              <td>Producto Terminado</td>
              <td>{{ $presupuesto->productor_ter_2_operacion }}</td>
              <td>{{ $presupuesto->productor_ter_2_operarios * $presupuesto->productor_ter_2_horas_operario}}</td>
              <td>{{ $presupuesto->productor_ter_2_precio_unidad }}</td>
              <td>{{ $presupuesto->total_productor_ter_2 }}</td>
            </tr>
            <tr>
              <td>{{ $presupuesto->oficial_1_operarios }}</td>
              <td>{{ $presupuesto->oficial_1_horas_operario }}</td>
              <td>Oficial 1ª</td>
              <td>{{ $presupuesto->oficial_1_operacion }}</td>
              <td>{{ $presupuesto->oficial_1_operarios * $presupuesto->oficial_1_horas_operario}}</td>
              <td>{{ $presupuesto->oficial_1_precio_unidad }}</td>
              <td>{{ $presupuesto->total_oficial_1 }}</td>
            </tr>
            <tr>
              <td>{{ $presupuesto->oficial_2_operarios }}</td>
              <td>{{ $presupuesto->oficial_2_horas_operario }}</td>
              <td>Oficial 2ª</td>
              <td>{{ $presupuesto->oficial_2_operacion }}</td>
              <td>{{ $presupuesto->oficial_2_operarios * $presupuesto->oficial_2_horas_operario }}</td>
              <td>{{ $presupuesto->oficial_2_precio_unidad }}</td>
              <td>{{ $presupuesto->total_oficial_2 }}</td>
            </tr>
            <tr>
              <td>{{ $presupuesto->ayudante_operarios }}</td>
              <td>{{ $presupuesto->ayudante_horas_operario }}</td>
              <td>Ayudante</td>
              <td>{{ $presupuesto->ayudante_operacion }}</td>
              <td>{{ $presupuesto->ayudante_operarios * $presupuesto->ayudante_horas_operario }}</td>
              <td>{{ $presupuesto->ayudante_precio_unidad }}</td>
              <td>{{ $presupuesto->total_ayudante }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- ===================
    == COSTES ADICIONALES ==
    ========================  -->


    <div class="row mt-3">
      <div class="col">
        <h3>COSTES ADICIONALES</h3>
        <table class="table table-striped table-sm">
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
              <td>{{ $presupuesto->desplazamiento_unidad }}</td>
              <td>{{ $presupuesto->total_desplazamiento}}</td>
            </tr>
            <tr>
              <td>Transporte</td>
              <td>{{ $presupuesto->transporte_unidad }}</td>
              <td>{{ $presupuesto->total_transporte}}</td>
            </tr>
            <tr>
              <td>Imprevistos</td>
              <td>{{ $presupuesto->imprevistos_unidad }}</td>
              <td>{{ $presupuesto->total_imprevistos}}</td>
            </tr>
            <tr>
              <td>IVA</td>
              <td>{{ $presupuesto->iva_unidad }}</td>
              <td>{{ $presupuesto->total_iva}}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- =======
    == PRECIO FINAL ==
    ============  -->

    <div class="row mt-3">
      <div class="col">
        <h3>Desglose de Precios</h3>
        <table class="table table-striped table-sm">
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

    <!-- =======
    == PLANOS ==
    ============  -->

    <div class="row mt-3">
      <div class="col">
        <h3>Planos</h3>
        @foreach($presupuesto->planos as $key => $plano)
          <img class="img-fluid" src="{{ Storage::url("$plano->filename") }}">
        @endforeach
      </div>
    </div>



</div>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
