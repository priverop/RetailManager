@extends('layouts.app')
@section('title', 'Presupuestos')
@section('content')





  <div class="container">


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
                <td> {{ $value->beneficio }} </td>
                <td> {{ $value->precio_final }} </td>


                <td>{{ $value->id}}</td>
              </tr>


          @endforeach



    </tbody>
  </table>
</div>

@endsection
