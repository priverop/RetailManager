@extends('layouts.app')

@section('title', 'Presupuestos')

@section('content')


<div class="row">

  <h2>Lista de Presupuestos</h2>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>Concepto</th>
        <th>Unidades</th>
        <th>Obra</th>
        <th>Cliente</th>
        <th>Fecha</th>
        <th>Estado</th>
        <th>Características</th>
        <th>Beneficio</th>
        <th>Beneficio Global</th>
        <th>Precio Final</th>
        <th>ID Presupuesto</th>
      </tr>
    </thead>
    <tbody>

          @foreach($presupuestos as $key => $value)
        <tr>
          <td> <a href='presupuestos/{{ $value->id }}'> {{ $value->concepto }}</a> </td>
          <td> {{ $value->unidades }} </td>
          <td>{{ $value->obra->id}}</td>
          <td>{{ $value->obra->cliente->nombre }}</td>
          <td> {{ $value->fecha }} </td>
          <td> {{ $value->estado }} </td>
          <td> {{ $value->caracteristicas }} </td>
          @if ($value->uso_beneficio_global === 1)
            <?php
                $beneficio = $value->obra->beneficio;
                $b_global = "Activado";
            ?>
          @else
            <?php
              $beneficio = $value->beneficio;
              $b_global = "Desactivado";
            ?>
          @endif
          <td> {{ $beneficio }} </td>
          <td> {{ $b_global }} </td>
          <td> {{ $value->precio_final }} </td>
          <td>{{ $value->id}}</td>
        <td><button type="button" id="eliminar" class="btn btn-danger eliminar" data-dismiss="modal">
          <span class='glyphicon glyphicon-remove'></span> X
        </button>
              <input type=“hidden” value='{{ $value->id }}' id='cliente_id' style="display:none;">
        </td>
        </tr>


          @endforeach



    </tbody>
  </table>
</div>

<script type="text/javascript">
      $(function() {
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $("body").on("click",".eliminar",function(){

           var id_bueno=$(this).next().val();
           var form_action = $("#addClienteForm").attr("action");
           var c_obj = $(this).parents("tr");

            $.ajax({
                dataType: 'json',

                type:'delete',

                url: 'presupuestos/'+id_bueno
            }).done(function(data){
                c_obj.remove();
                location.reload();

            });

        });
    });
</script>

@endsection
