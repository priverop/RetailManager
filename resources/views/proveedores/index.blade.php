

@extends('layouts.app')

@section('title', 'Proovedores')
<div class="container">
@section('content')
  
    


  


  <h2>Lista de Proveedores</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Dirección</th>
        <th>Provincia</th>
        <th>Teléfono</th>
        <th>Nif</th>
      </tr>
    </thead>
    <tbody>
       
          @foreach($proveedores as $key => $value)
        <tr>
        <td> <a href='proveedores/{{ $value->id }}'> {{ $value->nombre }}</a> </td>
        
        <td>{{ $value->direccion }}</td>
        
        <td>{{ $value->provincia }}</td>
            
        <td>{{ $value->telefono }}</td>
            
        <td>{{ $value->nif }}</td>
          
        </tr>
          
          
          @endforeach
          @endsection
      
      
    </tbody>
  </table>
</div>
