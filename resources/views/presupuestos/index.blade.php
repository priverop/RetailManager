@extends('layouts.app')
@section('title', 'Presupuestos')
@section('content')





  <div class="container">


  <h2>Lista de Presupuestos</h2>
      
      
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Obra para el cliente</th>
        <th>ID Presupuesto</th>
        
        
      </tr>
    </thead>
    <tbody>
       
          @foreach($presupuestos as $key => $value)
        <tr>
        <td> <a href='presupuestos/{{ $value->id }}'> {{ $value->nombre }}</a> </td>
        
        
        
        <td>{{ $value->obra->cliente->nombre }}</td>
            
        <td>{{ $value->id}}</td>
          
        </tr>
          
          
          @endforeach
          
      
      
    </tbody>
  </table>
</div>

@endsection
