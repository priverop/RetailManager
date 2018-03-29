@extends('layouts.app')

@section('title', 'Obra Individual')

@section('content')


  <h1>{{ $obra->cliente->nombre }}</h1>
  <h4>{{ $obra->fecha }}</h4>
  <p>Obra número {{ $obra->id }}</p>

  <div class="row mt-5 p-3 border">
    <table id="presupuestoIndex">
      <thead>
        <tr>
          <th>#</th>
          <th>Concepto</th>
          <th>Precio und.</th>
          <th>Unidades</th>
          <th>Precio Total</th>
        </tr>
      </thead>
      <tbody>
        @foreach($obra->presupuestos as $indice => $presupuesto)
          <tr>
            <td>{{$presupuesto->id}}</td>
            <td>{{$presupuesto->concepto}}</td>
            <td>{{$presupuesto->precio_final}}</td>
            <td>{{$presupuesto->unidades}}</td>
            <td>Multiplicar</td>
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
