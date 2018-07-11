@extends('layouts.app')

@section('title', 'Material')

@section('content')
<?php $location = 'materiales' ?>

<div class="row">
  <div class="col">
    <h2>Información del Material</h2>

    <table class="table mb-0">
      <tr>
        <th>ID</th>
        <td>{{ $material->id}}</td>
        <th>Nombre</th>
        <td>{{ $material->nombre }}</td>
        <th>Tipo de Matrial</th>
        <td>{{ $material->tipo}}</td>
      </tr>
    </table>

  </div>

</div>





@endsection
