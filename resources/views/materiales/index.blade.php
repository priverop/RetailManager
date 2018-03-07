@extends('layouts.app')

@section('title', 'Materiales')
<div class="container">
@section('content')
  
    


  


  <h2>Lista de Materiales</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Proveedor</th>
        
      </tr>
    </thead>
    <tbody>
       
          @foreach($materiales as $key => $value)
        <tr>
        <td> <a href='materiales/{{ $value->id }}'> {{ $value->nombre }}</a> </td>
        
        <td>{{ $value->precio }}</td>
        
        <td>{{ $value->proveedor->nombre }}</td>
          
        </tr>
          
          
          @endforeach
          @endsection
      
      
    </tbody>
  </table>
</div>


