@extends('layouts.app')

@section('title', 'Obra Individual')

@section('content')


  <h1>{{ $obra->cliente->nombre }}</h1>
  <h4>{{ $obra->fecha }}</h4>
  <p>Identificador de obra: {{ $obra->id }}</p>

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

<script>
$(function(){
  $('#presupuestoIndex').DataTable({
    "language": {
          "url": "{{ asset('/js/datatable_spanish.json') }}"
      }
  });
});
</script>


@endsection
