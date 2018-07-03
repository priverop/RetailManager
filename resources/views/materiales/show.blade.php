@extends('layouts.app')

@section('title', 'Material')

@section('content')
<?php $location = 'materiales' ?>

<div class="pt-5" id="clienteContainer">
  <h1>{{ $material->nombre }}</h1>
  <div class="row mt-5 p-3 border">
    <div class="col-xs-12">
      <p><b>Nombre:</b> {{ $material->nombre }}</p>
      <p><b>ID:</b> {{ $material->id}}</p>
    </div>
  </div>


</div>



@endsection
