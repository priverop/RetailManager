@extends('layouts.app')

@section('title', 'Presupuestos')

@section('content')


<div class="row">

  <h2>Lista de Presupuestos</h2>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
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
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>

      @foreach($presupuestos as $key => $value)
      <tr>
        <td>{{$value->id}}</td>
        <td> <a href="{{ route('presupuestos.show', ['id' => $value->id]) }}"> {{ $value->concepto }}</a> </td>
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
        <td>
          <button type="button" class="btn btn-outline-primary btn-sm" onclick="eliminarPresupuesto(this)">Borrar</button>
          <input type="hidden" value="{{route('presupuestos.destroy', ['id' => $value->id])}}">
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

    });

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
