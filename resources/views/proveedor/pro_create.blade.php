@extends('layouts.private.escritorio.dashboard')
@section('contenido')
<title>@section('title', __('Registrar proveedor'))</title>
<div class="card">
  <div class="card-header p-1">
    <ul class="nav nav-pills">
      @include('proveedor.pro_menu')
    </ul>
  </div>
  <div class="card-body">
    {!! Form::open(['route' => 'proveedor.store', 'onsubmit' => 'return checarBotonSubmit("btnsubmit")', 'files' => true]) !!}
      @include('proveedor.pro_createFields')
    {!! Form::close() !!}
  </div>
</div>
@endsection